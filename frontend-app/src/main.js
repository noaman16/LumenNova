import Vue from 'vue';
import App from './App.vue';
import axios from 'axios';

Vue.config.productionTip = false;

// Set the base URL for your Lumen/Laravel API
axios.defaults.baseURL = 'http://nova.local.com/tasks/api'; // Update with your API endpoint

Vue.prototype.$http = axios;

new Vue({
  render: h => h(App),
}).$mount('#app');
