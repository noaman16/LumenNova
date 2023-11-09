<template>
  <div>
    <form @submit.prevent="createTask">
      <input type="text" v-model="task.title" placeholder="Title">
      <input type="text" v-model="task.description" placeholder="Description">
      <button type="submit">Add Task</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      task: {
        title: '',
        description: ''
      }
    };
  },
  methods: {
    createTask() {
      axios.post('http://nova.local.com/tasks', this.task)
        .then(response => {
          console.log('Task added:', response.data);
          // Handle success
        })
        .catch(error => {
          console.error('Error adding task:', error);
          // Handle error
        });
    }
  }
};
</script>
