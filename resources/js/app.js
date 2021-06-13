require('./bootstrap');
window.Vue = require('vue').default;
Vue.use(Notifications)
import Notifications from 'vue-notification'
var $ = require( "jquery" );

import router from './routes'
import store from './store'
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('mainComponent', require('./components/master.vue').default);
const app = new Vue({
    el: '#app',
    router,
    store
});
