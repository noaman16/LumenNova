<template>
  <div class="login-page">
    <form @submit.prevent="submitForm" class="login-form">
      <h2>Login</h2>
      <label for="username">Username:</label>
      <input type="text" v-model="form.username" required class="input-field" />
      <label for="password">Password:</label>
      <input type="password" v-model="form.password" required class="input-field" />
      <button type="submit" class="submit-btn">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        username: '',
        password: '',
      },
    };
  },
  methods: {
    submitForm() {
      // Add your login logic here
      console.log('Login form submitted:', this.form);
      // Redirect to the task list page after successful login
      this.$router.push('/tasks');
    },
  },
};
</script>

<style scoped>
.login-page {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
}

.login-form {
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 5px;
  padding: 20px;
}

h2 {
  color: #4A412A;
}

.input-field {
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
</style>
