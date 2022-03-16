
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router'
import Vuelidate from 'vuelidate'
import Toasted from 'vue-toasted'
import VuejsDialog from 'vuejs-dialog'
import VueSignaturePad from 'vue-signature-pad'
import StarRating from 'vue-star-rating'
import Loading from 'vue-full-loading'
import Moment from 'vue-moment'




import Datetime from 'vue-datetime'
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'



import ChefRegister from './components/ChefRegister'
import ClientRegister from './components/ClientRegister'
import Login from './components/Login'
import PasswordReset from './components/PasswordReset'
import PasswordResetConfirm from './components/PasswordResetConfirm'

import ChefAgreement from './components/dashboard/Agreement'
import ChefAgreementApproval from './components/dashboard/AgreementApproval'
import ChefWallet from './components/dashboard/chef/Wallet'
import DishCreate from './components/dashboard/DishCreate'
import DishList from './components/dashboard/DishList'
import ChefOrderList from './components/dashboard/chef/OrderList'

import ClientOrderList from './components/dashboard/client/OrderList'
import ClientOrderCheckout from './components/dashboard/client/OrderCheckout'
import ClientOrderComplete from './components/dashboard/client/OrderComplete'



import Profile from './components/dashboard/Profile'
import ProfileEdit from './components/dashboard/ProfileEdit'
import Chefs from './components/Chefs'
import Dishes from './components/Dishes'
import Dish from './components/Dish'
import Chef from './components/Chef'
import Payment from './components/dashboard/client/Payment'
import ChefBank from './components/dashboard/chef/Bank'


window.Vue = require('vue');

Vue.use(VueRouter)
Vue.use(Vuelidate)
Vue.use(Toasted)
Vue.use(VuejsDialog);
Vue.use(VueSignaturePad)
Vue.use(Datetime)
Vue.use(Moment)
Vue.component('star-rating', StarRating);
Vue.component('loading',Loading)




const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/chef/register',
            name: 'chef-register',
            component: ChefRegister
        },
        {
            path: '/client/register',
            name: 'client-register',
            component: ClientRegister
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/password/reset',
            name: 'password-reset',
            component: PasswordReset
        },
        {
            path: '/password/reset-confirm',
            name: 'password-reset-confirm',
            component: PasswordResetConfirm
        },
        {
            path: '/chef/agreement',
            name: 'agreement',
            component: ChefAgreement
        },
        {
            path: '/chef/agreement-approval',
            name: 'agreement-approval',
            component: ChefAgreementApproval
        },
        {
            path: '/chef/wallet',
            name: 'chef-wallet',
            component: ChefWallet
        },
        {
            path: '/client/payment',
            name: 'client-payment',
            component: Payment
        },
        {
            path: '/chef/bank',
            name: 'chef-bank',
            component: ChefBank
        },
        {
            path: '/dish/create',
            name: 'dish-create',
            component: DishCreate
        },
        {
            path: '/dish/edit/:id',
            name: 'dish-edit',
            component: DishCreate
        },
        {
            path: '/dish/list',
            name: 'dish-list',
            component: DishList
        },
        {
            path: '/chef/order/list',
            name: 'chef-order-list',
            component: ChefOrderList
        },
        {
            path: '/client/order/list',
            name: 'client-order-list',
            component: ClientOrderList
        },
        {
            path: '/client/order/checkout/:dish_id/:no_of_people/:service_type/:time_slot',
            name: 'client-order-checkout',
            component: ClientOrderCheckout
        },
        {
            path: '/client/order/complete/:order_id',
            name: 'client-order-complete',
            component: ClientOrderComplete
        },
        {
            path: '/profile',
            name: 'profile',
            component: Profile
        },
        {
            path: '/profile/edit',
            name: 'profileEdit',
            component: ProfileEdit
        },
        {
            path: '/chefs',
            name: 'chefs',
            component: Chefs
        },
        {
            path: '/dishes',
            name: 'dishes',
            component: Dishes
        },
        
        {
            path: '/dish/:id',
            name: 'dish',
            component: Dish
        },
        {
            path: '/chef/:id',
            name: 'chef',
            component: Chef
        },
        
     
    ],
    

});

//let token = document.head.querySelector('meta[name="csrf-token"]');
// window.axios.defaults.headers.common['Autherization'] = 'Test....'

window.axios.interceptors.response.use((response) => { // intercept the global error
  
    return response
  }, function (error) { console.log('ERROR..', error.response.status)
    //let originalRequest = error.config
    if (error.response.status === 401) { 
        localStorage.removeItem('user');
        window.location.href = '/login'
    }
    return Promise.reject(error.response);
      
})
    

if (localStorage.getItem('user')) { console.log('Token ======', localStorage.getItem('user'));
 let user = JSON.parse(localStorage.getItem('user'))
 //Vue.prototype.$appUser = user
 window.axios.defaults.headers.common['Authorization'] =  'Bearer '+ user.token;
}

Vue.mixin({
    created: function () { 
    
    },
    computed: {
        $appUser() {
            return JSON.parse(localStorage.getItem('user'))
        },
    },
    methods: {
         appLogout() {
            localStorage.removeItem('user');
            window.location.href = '/login'
         }
    }
  })
  

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('dashboard-sidebar', require('./components/dashboard/DashboardSidebar.vue').default);
Vue.component('dashboard-statusbar', require('./components/dashboard/DashboardStatusbar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {},
    router
});
