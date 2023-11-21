import Vue from 'vue';
import Router from 'vue-router';
import TaskList from '@/components/TaskList';
import Login from '@/views/Login'; // Import the Login component



Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      redirect: '/login', // Redirect to login page by default
    },
    {
      path: '/login',
      name: 'Login',
      component: Login,
    },
    {
      path: '/tasks',
      name: 'TaskList',
      component: TaskList,
    },
  ],
});
