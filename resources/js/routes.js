import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store';
Vue.use(VueRouter)
let routes = [
    {
        path: '/',
        component: require('./components/home/master').default,
        children:[
            {
                path: '/',
                component: require('./components/home/main').default,
            },
            {
                path: '/register',
                component: require('./components/auth/register').default,
                name: 'register',
                meta: {
                    requiredVisitor: true,
                }
            },
        
            {
                path: '/email_varify/:email/:id',
                component: require('./components/auth/email_varify').default,
                name: 'email_varify'
            },
            {
                path: '/login',
                component: require('./components/auth/login').default,
                name: 'login',
                meta: {
                    requiredVisitor: true,
                }
            },
            {
                path: '/logout',
                component: require('./components/auth/logout').default,
                name: 'logout',
            },
            {
                path: '/dashboard',
                component: require('./components/dashboard/dashboard').default,
                name: 'dashboard',
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: '/blogs',
                component: require('./components/blog/blog').default,
                name: 'blogs',
               
            },
            {
                path: '/privacy_&_policy',
                component: require('./components/privacypolicy/privacy_&_policy').default,
                name: 'privacy',
               
            },
            {
                path: '/licence',
                component: require('./components/licencing/licence').default,
                name: 'licence',
               
            },
            {
                path: '/termsandcondition',
                component: require('./components/termsandcondition/termsandcondition').default,
                name: 'termsandcondition',
               
            },
        ]
    },
    {
        path:'/web/template',
        component: require('./components/products/product_master').default,
        children:[
            {
                path: '/web/template',
                component: require('./components/products/product_list/product_list').default,
                name: 'web_template',
            },
        ],
    },

    


];

const router = new VueRouter({
    history: true,
    hashbang: false,
    // linkActiveClass: 'active',
    routes,
     
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getters.logedIn) {
            next({
                name: 'login',
            })
        } else {
            next()
        }
    } else if (to.matched.some(record => record.meta.requiredVisitor)) {
        if (store.getters.logedIn) {
            next({
                path: '/',
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
});

export default router;
