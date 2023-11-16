<template>
  <div>
    <h2>Task List</h2>

    <!-- Form for creating a new task -->
    <form @submit.prevent="createTask">
      <label>Title:</label>
      <input v-model="newTask.title" required />
      
      <label>Description:</label>
      <input v-model="newTask.description" />

      <button type="submit">Add Task</button>
    </form>

    <ul>
      <li v-for="task in tasks" :key="task.id">
        {{ task.title }} - {{ task.description }}
        <button @click="editTask(task)">Edit</button>
        <button @click="deleteTask(task.id)">Delete</button>
      </li>
    </ul>

    <!-- Form for editing an existing task -->
    <div v-if="editingTask">
      <h3>Edit Task</h3>
      <form @submit.prevent="updateTask">
        <label>Title:</label>
        <input v-model="editingTask.title" required />
        
        <label>Description:</label>
        <input v-model="editingTask.description" />

        <button type="submit">Update Task</button>
        <button @click="cancelEdit">Cancel</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: [],
      newTask: {
        title: '',
        description: '',
      },
      editingTask: null,
    };
  },
  mounted() {
    this.fetchTasks();
  },
  methods: {
    fetchTasks() {
      this.$http.get('http://nova/local.com/tasks')
        .then(response => {
          this.tasks = response.data;
        })
        .catch(error => {
          console.error('Error fetching tasks:', error);
        });
    },
    createTask() {
      this.$http.post('http://nova/local.com/tasks', this.newTask)
        .then(response => {
          this.tasks.push(response.data);
          this.newTask = { title: '', description: '' };
        })
        .catch(error => {
          console.error('Error creating task:', error);
        });
    },
    editTask(task) {
      this.editingTask = { ...task };
    },
    updateTask() {
      this.$http.put(`http://nova/local.com/tasks/${this.editingTask.id}`, this.editingTask)
        .then(response => {
          const index = this.tasks.findIndex(task => task.id === response.data.id);
          if (index !== -1) {
            this.$set(this.tasks, index, response.data);
            this.editingTask = null;
          }
        })
        .catch(error => {
          console.error('Error updating task:', error);
        });
    },
    deleteTask(taskId) {
      this.$http.delete(`http://nova/local.com/tasks/${taskId}`)
        .then(() => {
          this.tasks = this.tasks.filter(task => task.id !== taskId);
        })
        .catch(error => {
          console.error('Error deleting task:', error);
        });
    },
    cancelEdit() {
      this.editingTask = null;
    },
  },
};
</script>

<style scoped>
/* Add your component styles here if needed */
</style>
