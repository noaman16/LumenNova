import Vue from 'vue';
import Router from 'vue-router';
// import HelloWorld from '@/components/HelloWorld';
import TaskList from '@/components/TaskList';

Vue.use(Router);

export default new Router({
  routes: [
    // {
    //   path: '/',
    //   name: 'Home',
    //   component: HelloWorld
    // },
    {
      path: '/',
      name: 'Tasklist',
      component: TaskList
    }
  ]
});
