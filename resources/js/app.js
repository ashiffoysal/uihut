require('./bootstrap');
window.Vue = require('vue').default;
Vue.mixin(require('./mixin/assets'));
Vue.use(Notifications)
import Notifications from 'vue-notification'

import router from './routes'
import store from './store'
import Nprogress from 'nprogress'
import 'nprogress/nprogress.css';



axios.interceptors.request.use(function (config) {
    
    Nprogress.start();
    
    return config;
  }, function (error) {
      console.log(error)
    return Promise.reject(error);
  });

  axios.interceptors.response.use(function (response) {
    Nprogress.done();
    
    
    return response;
  }, function (error) {
    console.log(error)
    return Promise.reject(error);
  });

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('mainComponent', require('./components/master.vue').default);
const app = new Vue({
    el: '#app',
    router,
    store
});
