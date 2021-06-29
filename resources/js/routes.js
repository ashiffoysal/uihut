import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store';
Vue.use(VueRouter)
let routes = [
    {
        path: '/',
        component: require('./components/home/master').default,
        children: [
            {
                path: '/',
                component: require('./components/home/main').default,
                name: 'home',
            },


            {
                path: '/logout',
                component: require('./components/auth/logout').default,
                name: 'logout',
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
            {
                path: '/pricing',
                component: require('./components/pricingpage/master').default,
                name: 'pricing',

            },

        ]
    },
    {
        path: '/',
        component: require('./components/products/product_master').default,
        children: [
            {
                path: '/:cat/:subcat',
                component: require('./components/products/product_list/products').default,
                name: 'products',
            },
            {
                path: '/product-/:slug/:id',
                component: require('./components/products/product_list/product_details').default,
                name: 'singleProduct',
            },
            {
                path: '/product/download',
                component: require('./components/products/product_list/product_download').default,
                name: 'downloadFile',
                meta: {
                    requiresAuth: true,
                },
            },
            {
                path: '/gallery/image/:slug/:id',
                component: require('./components/products/product_list/details/gallery_img_details').default,
                name: 'galleryImage',
            },
        ],
    },


    {
        path: '/login',
        component: require('./components/auth/loginmaster').default,
        children: [
            {
                path: '/login',
                component: require('./components/auth/login').default,
                name: 'login',
                meta: {
                    requiredVisitor: true,
                }
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
                name: 'email_varify',
                meta: {
                    requiredVisitor: true,
                }
            },
            {
                path: '/forgot/password/email',
                component: require('./components/auth/forgot_password/email').default,
                name: 'forgotPassword',
                meta: {
                    requiredVisitor: true,
                }
            },
            {
                path: '/email/varify/:token',
                component: require('./components/auth/forgot_password/forgot_email_varify').default,
                name: 'forgot_email_varify',
                meta: {
                    requiredVisitor: true,
                }
            },
            {
                path: '/forgot/password/reset/:remember_token',
                component: require('./components/auth/forgot_password/forgot_password_reset').default,
                name: 'forgotPasswordReset',
                meta: {
                    requiredVisitor: true,
                }
            },
        ],
    },
    {
        path: '/dashboard',
        component: require('./components/dashboard/master').default,
        children: [
            {
            
                path: '/dashboard',
                component: require('./components/dashboard/dashboard').default,
                name: 'dashboard',
                meta: {
                    requiresAuth: true,
                }
                
            },
            {
            
                path: '/collection',
                component: require('./components/dashboard/collection').default,
                name: 'collection',
                meta: {
                    requiresAuth: true,
                }
                
            },
            {
            
                path: '/billingplan',
                component: require('./components/dashboard/plan_and_billing').default,
                name: 'planandbilling',
                meta: {
                    requiresAuth: true,
                }
                
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

    // if (to.matched.some(record => record.meta.requiredDownloadAuth)) {
    //     if (!store.getters.logedIn) {
    //         next({
    //             name: 'login',
    //         })
    //     } else {
    //         next()
    //     }
    // } else if (to.matched.some(record => record.meta.requiredSubcriber)) {
    //     if (!store.getters.isSubscriber) {
    //         next({
    //             name: 'pricing',
    //         })
    //     } else {
    //         next()
    //     }
    // }else{
    //     next()
    // }
});

export default router;
