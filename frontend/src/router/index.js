import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import DevHome from '@/components/Developers/DevHome'
import DevForm from '@/components/Developers/DevForm'

Vue.use(Router)

export default new Router({
  history: true,
  routes: [
    { path: '/', name: 'Home', component: Home },
    { path: '/developers', component: DevHome },
    { path: '/developers/new', component: DevForm },
    { path: '/developers/update/:id', component: DevForm }
  ]
})