import Vue from 'vue'
import Router from 'vue-router'
import Fbcontent from '../components/Fbcontent'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Fbcontent',
      component: Fbcontent
    }
  ]
})
