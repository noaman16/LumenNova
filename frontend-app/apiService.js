// apiService.js

import axios from 'axios';

const API_URL = 'http://nova.local.com'; // Change to your Lumen backend URL
//const API_URL = process.env.VUE_APP_API_URL;

export default {
  getAllTasks() {
    return axios.get(`${API_URL}/tasks`);
  },

  getTask(id) {
    return axios.get(`${API_URL}/tasks/${id}`);
  },

  createTask(taskData) {
    return axios.post(`${API_URL}/tasks`, taskData);
  },

  updateTask(id, taskData) {
    return axios.put(`${API_URL}/tasks/${id}`, taskData);
  },

  deleteTask(id) {
    return axios.delete(`${API_URL}/tasks/${id}`);
  }
};
