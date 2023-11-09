<template>
  <div>
    <ul>
      <li v-for="task in tasks" :key="task.id">
        {{ task.title }}
        <button @click="deleteTask(task.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
import apiService from './apiService.js';

export default {
  data() {
    return {
      tasks: []
    };
  },
  mounted() {
    this.fetchTasks();
  },
  methods: {
    fetchTasks() {
      apiService.getAllTasks()
        .then(response => {
          this.tasks = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    deleteTask(id) {
      apiService.deleteTask(id)
        .then(() => {
          this.fetchTasks(); // Refresh task list after deletion
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
};
</script>
