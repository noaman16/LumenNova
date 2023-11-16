import Vue from 'vue'
import Router from 'vue-router'
import ItemComponent from '@/components/HelloWorld'
 

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'ItemComponent',
      component: ItemComponent
    }
  ]
})
