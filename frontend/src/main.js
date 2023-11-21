// import Vue from 'vue';
// import App from './App';
// import axios from 'axios';

// Vue.config.productionTip = false;

// // Set the base URL for Axios
// axios.defaults.baseURL = 'http://nova.local.com:80';

// Vue.prototype.$axios = axios;

// new Vue({
//   render: h => h(App),
// }).$mount('#app');
import Vue from "vue";
import App from "./App.vue";
import router from "./router";

import "bootstrap/dist/css/bootstrap.min.css";
import "datatables.net-bs4";
import "datatables.net-bs4/css/dataTables.bootstrap4.min.css";
import "jszip";
import "pdfmake";
import "datatables.net-buttons-bs4";
import "datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css";
import "datatables.net-buttons/js/buttons.colVis";
import "datatables.net-buttons/js/buttons.flash";
import "datatables.net-buttons/js/buttons.html5";
import "datatables.net-buttons/js/buttons.print";



Vue.config.productionTip = false;

new Vue({
  router,
  render: (h) => h(App),
}).$mount("#app");