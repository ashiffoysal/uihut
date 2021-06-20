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
                name:'home',
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
    // { 
    //     path: '/:catchAll(.*)', 
    //     component: require('./components/errors/404').default,
    //     name: 'NotFound'
    //   },
    {
        path:'/',
        component: require('./components/products/product_master').default,
        children:[
            {
                path: '/:cat/:subcat',
                component: require('./components/products/product_list/products').default,
                name: 'products',       
            },
            {
                path: '/single/product/:id',
                component: require('./components/products/product_list/product_details').default,
                name: 'singleProduct',       
            },
        ],
    },
    

    {
        path:'/login',
        component: require('./components/auth/loginmaster').default,
        children:[
            {       path: '/login',
                    component: require('./components/auth/login').default,
                    name: 'login',
                    meta: {
                        requiredVisitor: true,
                    }
            },
            {       path: '/register',
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
