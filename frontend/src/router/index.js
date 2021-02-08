import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import DevHome from '@/components/Developers/DevHome'
import DevNew from '@/components/Developers/DevNew'
// import DevShow from '@/components/Developers/DevShow'
// import DevUpdate from '@/components/Developers/DevUpdate'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/', name: 'Home', component: Home },
    { path: '/developers', component: DevHome,
      children: [
        { path: '/new', component: DevNew },
        // { path: '/show/:id', component: DevShow },
        // { path: '/update/:id', component: DevUpdate }
      ]
    }
    
  ]
})