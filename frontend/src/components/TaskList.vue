<template>
  <div class="task-list" style="background-color: #f3f3f3;">
    <div class="app-header">
      <h1 style="color: #4A412A;">LumenNova APP</h1>
      <p style="color: #28a745;">Manage your tasks efficiently with <span style="font-weight: bold;">LumenNova</span>!</p>
      <a href="http://nova.local.com/tasks_table_view" target="_blank"><button@click>See DataTable</button></a>
    </div>

    <!-- Form for creating a new task -->
    <form @submit.prevent="submitForm" class="task-form">
      <h2>{{ formMode === 'create' ? 'Create New Task' : 'Edit Task' }}</h2>
      <label for="title">Title:</label>
      <input type="text" v-model="form.title" required class="input-field" />
      <label for="description">Description:</label>
      <textarea v-model="form.description" required class="textarea-field"></textarea>
      <button type="submit" class="submit-btn">
        {{ formMode === 'create' ? 'Create Task' : 'Update Task' }}
      </button>
    </form>

    <!-- Display the task list -->
    <h2>Task List</h2>
    <ul v-if="paginatedTasks.length > 0" class="task-list-ul">
      <li v-for="task in paginatedTasks" :key="task.id" class="task-item">
        <div class="task-details">
          <span class="task-title">{{ task.title }}</span>
          <div class="task-buttons">
            <button @click="viewTask(task.id)" class="btn-view">View</button>
            <button @click="editTask(task.id)" class="btn-edit">Edit</button>
            <button @click="deleteTask(task.id)" class="btn-delete">Delete</button>
          </div>
        </div>
      </li>
    </ul>
    <p v-else class="no-tasks">No tasks available</p>

    <!-- Pagination -->
    <div class="pagination">
      <button v-for="pageNumber in totalPages" :key="pageNumber" @click="changePage(pageNumber)">
        {{ pageNumber }}
      </button>
    </div>

    <!-- Display the selected task -->
    <div v-if="selectedTask" class="selected-task">
      <h3>{{ selectedTask.title }}</h3>
      <p>{{ selectedTask.description }}</p>
      <button @click="clearSelectedTask" class="btn-back">Back to Task List</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: [],
      selectedTask: null,
      form: {
        title: '',
        description: ''
      },
      formMode: 'create', // 'create' or 'update'
      currentPage: 1,
      tasksPerPage: 5
    };
  },
  computed: {
    paginatedTasks() {
      const start = (this.currentPage - 1) * this.tasksPerPage;
      const end = start + this.tasksPerPage;
      return this.tasks.slice(start, end);
    },
    totalPages() {
      return Math.ceil(this.tasks.length / this.tasksPerPage);
    }
  },
  mounted() {
    this.fetchTasks();
  },
  methods: {
    async fetchTasks() {
      try {        
        const response = await this.$axios.get('/tasks');
        this.tasks = response.data;
      } catch (error) {
        console.error('Error fetching tasks:', error);
      }
    },
    async viewTask(id) {
      try {
        const response = await this.$axios.get(`/tasks/${id}`);
        this.selectedTask = response.data;
      } catch (error) {
        console.error('Error fetching task details:', error);
      }
    },
    editTask(id) {
      // Set formMode to 'update' before fetching task details
      this.formMode = 'update';

      // Fetch task details
      this.viewTask(id);

      // Set form data with the selected task details
      this.form = {
        title: this.selectedTask.title,
        description: this.selectedTask.description,
      };
    },
    async deleteTask(id) {
      try {
        await this.$axios.delete(`/tasks/${id}`);
        this.fetchTasks();
        this.clearSelectedTask();
      } catch (error) {
        console.error('Error deleting task:', error);
      }
    },
    clearSelectedTask() {
      this.selectedTask = null;
      this.form = {
        title: '',
        description: ''
      };
      this.formMode = 'create';
    },
    async submitForm() {
      try {
        if (this.formMode === 'create') {
          await this.$axios.post('/tasks', this.form);
        } else if (this.formMode === 'update' && this.selectedTask) {
          await this.$axios.put(`/tasks/${this.selectedTask.id}`, this.form);
        }

        this.fetchTasks();
        this.clearSelectedTask();
      } catch (error) {
        console.error('Error submitting form:', error);
      }
    },
    changePage(pageNumber) {
      this.currentPage = pageNumber;
    }
  }
};
</script>

<style scoped>
.task-list {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.app-header {
  text-align: center;
  margin-bottom: 20px;
}

.app-header h1 {
  font-size: 2em;
  margin-bottom: 5px;
}

.app-header p {
  color: #6c757d;
}

.task-form {
  margin-bottom: 20px;
}

.task-list-ul {
  list-style-type: none;
  padding: 0;
}

.task-item {
  background-color: #f8f9fa;
  border: 1px solid #dee2e6;
  border-radius: 5px;
  margin-bottom: 10px;
  padding: 10px;
}

.task-details {
  display: flex;
  justify-content: space-between;
}

.task-title {
  font-weight: bold;
}

.task-buttons button {
  margin-left: 5px;
}

.no-tasks {
  color: #868e96;
  font-style: italic;
}

.pagination {
  margin-top: 10px;
}

.pagination button {
  margin-right: 5px;
  cursor: pointer;
}

.selected-task {
  margin-top: 20px;
}

.input-field,
.textarea-field {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ced4da;
  border-radius: 4px;
  box-sizing: border-box;
}

.submit-btn {
  background-color: #007bff;
  color: #fff;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-back {
  background-color: #6c757d;
}

.btn-view {
  background-color: #17a2b8;
}

.btn-edit {
  background-color: skyblue;
}

.btn-delete {
  background-color: red;
}
</style>
