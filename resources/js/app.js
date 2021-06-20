require('./bootstrap');
window.Vue = require('vue').default;
Vue.mixin(require('./mixin/assets'));
Vue.use(Notifications)
import Notifications from 'vue-notification'

import router from './routes'
import store from './store'
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('mainComponent', require('./components/master.vue').default);
const app = new Vue({
    el: '#app',
    router,
    store
});
