require('./bootstrap');
window.Vue = require('vue').default;
import router from './routes'
Vue.component('mainComponent', require('./components/master.vue').default);
const app = new Vue({
    el: '#app',
    router
});
