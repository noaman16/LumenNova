<template>
  <div>
    <h2>Task List</h2>

    <!-- Display Tasks -->
    <ul>
      <li v-for="task in tasks" :key="task.id">
        {{ task.title }}
        <button @click="editTask(task)">Edit</button>
        <button @click="deleteTask(task.id)">Delete</button>
      </li>
    </ul>

    <!-- Create Task Form -->
    <form @submit.prevent="createTask">
      <label>Title:</label>
      <input v-model="newTask.title" required />

      <label>Description:</label>
      <textarea v-model="newTask.description"></textarea>

      <button type="submit">Add Task</button>
    </form>

    <!-- Edit Task Form -->
    <div v-if="editMode">
      <h3>Edit Task</h3>
      <form @submit.prevent="updateTask">
        <label>Title:</label>
        <input v-model="editedTask.title" required />

        <label>Description:</label>
        <textarea v-model="editedTask.description"></textarea>

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
      editedTask: {
        id: null,
        title: '',
        description: '',
      },
      editMode: false,
    };
  },
  methods: {
    async fetchTasks() {
      try {
        const response = await this.$axios.get('http://nova.local.com/tasks/api');
        this.tasks = response.data;
      } catch (error) {
        console.error('Error fetching tasks', error);
      }
    },
    async createTask() {
      try {
        const response = await this.$axios.post('http://nova.local.com/tasks/api', this.newTask);
        this.tasks.push(response.data);
        this.newTask = {}; // Clear the form
      } catch (error) {
        console.error('Error creating task', error);
      }
    },
    editTask(task) {
      this.editedTask = { ...task };
      this.editMode = true;
    },
    async updateTask() {
      try {
        const response = await this.$axios.put(`http://nova.local.com/tasks/${this.editedTask.id}`, this.editedTask);
        const index = this.tasks.findIndex(task => task.id === this.editedTask.id);
        this.$set(this.tasks, index, response.data);
        this.editMode = false;
        this.editedTask = { id: null, title: '', description: '' };
      } catch (error) {
        console.error('Error updating task', error);
      }
    },
    async deleteTask(id) {
      try {
        await this.$axios.delete(`http://nova.local.com/tasks/${id}`);
        this.tasks = this.tasks.filter(task => task.id !== id);
      } catch (error) {
        console.error('Error deleting task', error);
      }
    },
    cancelEdit() {
      this.editMode = false;
      this.editedTask = { id: null, title: '', description: '' };
    },
  },
  mounted() {
    this.fetchTasks(); // Fetch tasks when the component is mounted
  },
};
</script>

<style>
/* Add your component styles here */
</style>
