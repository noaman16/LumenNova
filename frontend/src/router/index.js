// router/index.js
import Vue from 'vue';
import VueRouter from 'vue-router';
import TaskList from '@/components/TaskList';
import DataTable from '@/components/DataTable';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'TaskList',
    component: TaskList,
  },
  {
    path: '/datatable',
    name: 'DataTable',
    component: DataTable,
  },
];

const router = new VueRouter({
  routes,
});

export default router;
