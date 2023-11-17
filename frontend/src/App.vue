<template>
  <div id="app">
    <TaskList />
  </div>
</template>

<script>
import TaskList from '@/components/TaskList';

export default {
  components: {
    TaskList
  }
};
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
