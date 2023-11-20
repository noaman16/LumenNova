<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="login">
      <label for="username">Username:</label>
      <input type="text" v-model="username" required />
      <label for="password">Password:</label>
      <input type="password" v-model="password" required />
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <router-link to="/register">Register</router-link></p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: '',
      password: '',
    };
  },
  methods: {
    login() {
      this.$axios.post('http://localhost:8000/login', {
        username: this.username,
        password: this.password,
      })
        .then(response => {
          console.log(response.data);
          // Store the token in Vuex or localStorage
          // Redirect to the tasks page or wherever needed
          this.$router.push('/tasks');
        })
        .catch(error => {
          console.error('Login failed:', error.response.data);
        });
    },
  },
};
</script>
