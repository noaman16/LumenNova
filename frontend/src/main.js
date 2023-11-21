import Vue from 'vue';
import App from './App';
import axios from 'axios';
import Vuex from 'vuex'; // Import Vuex

Vue.config.productionTip = false;

// Set the base URL for Axios
axios.defaults.baseURL = 'http://nova.local.com:80';

Vue.prototype.$axios = axios;

Vue.use(Vuex); // Use Vuex

// Create a Vuex store
const store = new Vuex.Store({
  state: {
    isAuthenticated: false,
  },
  mutations: {
    login(state) {
      state.isAuthenticated = true;
    },
    logout(state) {
      state.isAuthenticated = false;
    },
  },
});

new Vue({
  render: h => h(App),
  store, // Provide the store to all components
}).$mount('#app');
