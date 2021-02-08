import Vue from 'vue'
import App from './App'
import router from './router'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import axios from 'axios'

// Rota padrão pra API.
axios.defaults.baseURL = 'http://localhost:8000/api';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.config.productionTip = false


new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})