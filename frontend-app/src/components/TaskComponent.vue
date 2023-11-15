<template>
  <div>
    <h1 class="title">Welcome to LumenNova</h1>

    <!-- Welcome Message -->
    <div class="welcome-message">
      <p>Welcome to <span class="highlight">LumenNova</span>!</p>
      <p>Manage your tasks with ease</p>
    </div>

    <!-- Task List -->
    <ul class="task-list">
      <li v-for="task in tasks" :key="task.id">
        {{ task.title }} - {{ task.description }}
        <button @click="editTask(task.id)" class="action-button edit-button">Edit</button>
        <button @click="deleteTask(task.id)" class="action-button delete-button">Delete</button>
      </li>
    </ul>

    <!-- Create Task Form -->
    <div class="create-task-form">
      <h2>Create Task</h2>
      <form @submit.prevent="createTask">
        <label for="title">Title:</label>
        <input type="text" id="title" v-model="newTask.title" required>

        <label for="description">Description:</label>
        <textarea id="description" v-model="newTask.description"></textarea>

        <button type="submit" class="action-button create-button">Create</button>
      </form>
    </div>

    <!-- Edit Task Form -->
    <div v-if="editMode" class="edit-task-form">
      <h2>Edit Task</h2>
      <form @submit.prevent="updateTask">
        <label for="editTitle">Title:</label>
        <input type="text" id="editTitle" v-model="editedTask.title" required>

        <label for="editDescription">Description:</label>
        <textarea id="editDescription" v-model="editedTask.description"></textarea>

        <button type="submit" class="action-button update-button">Update</button>
        <button @click="cancelEdit" class="action-button cancel-button">Cancel</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: [],
      newTask: { title: '', description: '' },
      editedTask: { id: null, title: '', description: '' },
      editMode: false,
    };
  },
  created() {
    this.fetchTasks();
  },
  methods: {
    async fetchTasks() {
      // ... (your existing fetchTasks method)
    },
    async createTask() {
      try {
        const response = await this.$http.post('/tasks', this.newTask);
        this.tasks.push(response.data);
        this.newTask = { title: '', description: '' };
      } catch (error) {
        console.error('Error creating task:', error);
      }
    },
    // ... (other methods)
  },
};
</script>

<style scoped>
.title {
  color: #3498db; /* Blue color */
  text-align: center;
}

.welcome-message {
  margin: 20px 0;
  padding: 10px;
  background-color: #ecf0f1; /* Light gray background */
  border-radius: 5px;
  text-align: center;
}

.highlight {
  color: #e74c3c; /* Red color */
}

.task-list {
  list-style-type: none;
  padding: 0;
}

.task-list li {
  margin: 10px 0;
  padding: 10px;
  background-color: #ecf0f1; /* Light gray background */
  border-radius: 5px;
  display: flex;
  justify-content: space-between;
}

.action-button {
  cursor: pointer;
  padding: 5px 10px;
  border: none;
  border-radius: 3px;
  color: #fff;
  font-weight: bold;
}

.edit-button {
  background-color: #2ecc71; /* Green color */
}

.delete-button {
  background-color: #e74c3c; /* Red color */
}

.create-task-form,
.edit-task-form {
  margin-top: 20px;
}

.create-task-form label,
.edit-task-form label {
  display: block;
  margin: 10px 0 5px;
  font-weight: bold;
}

.create-button {
  background-color: #3498db; /* Blue color */
}

.update-button {
  background-color: #2ecc71; /* Green color */
}

.cancel-button {
  background-color: #e74c3c; /* Red color */
}
</style>
