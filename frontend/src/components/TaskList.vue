<template>
  <div>
    <h2>Task List</h2>
    
    <!-- Display the task list -->
    <ul v-if="tasks.length > 0">
      <li v-for="task in tasks" :key="task.id">
        {{ task.title }} - <button @click="viewTask(task.id)">View</button>
        <button @click="editTask(task.id)">Edit</button>
        <button @click="deleteTask(task.id)">Delete</button>
      </li>
    </ul>
    <p v-else>No tasks available</p>

    <!-- Display the selected task or form for creating/updating tasks -->
    <div v-if="selectedTask">
      <h3>{{ selectedTask.title }}</h3>
      <p>{{ selectedTask.description }}</p>
      <button @click="clearSelectedTask">Back to Task List</button>
    </div>
    <form v-else @submit.prevent="submitForm">
      <label for="title">Title:</label>
      <input type="text" v-model="form.title" required />
      <label for="description">Description:</label>
      <textarea v-model="form.description" required></textarea>
      <button type="submit">{{ formMode === 'create' ? 'Create Task' : 'Update Task' }}</button>
    </form>
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
      formMode: 'create' // 'create' or 'update'
    };
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
      this.formMode = 'update';
      this.viewTask(id);
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
    }
  }
};
</script>

<style scoped>
h2, h3 {
  color: #35424a;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  margin-bottom: 10px;
}

form {
  margin-top: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}
</style>
