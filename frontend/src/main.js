import Vue from 'vue';
import App from './App';
import axios from 'axios';
import router from './router';

Vue.config.productionTip = false;

// Set the base URL for Axios
axios.defaults.baseURL = 'http://nova.local.com:80';

Vue.prototype.$axios = axios;

new Vue({
  render: h => h(App),
  router,
}).$mount('#app');
