require('./bootstrap');

window.Vue = require('vue');

window.VueRouter = require('vue-router').default;

window.VueAxios = require('vue-axios').default;

window.Axios = require('axios').default;

let AppLayout = require('./components/App.vue').default;

const Home = Vue.component('Home', require('./components/Home.vue').default);
const TransportList = Vue.component('TransportList', require('./components/transport/TransportList.vue').default);
const TransportAdd = Vue.component('TransportAdd', require('./components/transport/TransportAdd.vue').default);
const TransportEdit = Vue.component('TransportEdit', require('./components/transport/TransportEdit.vue').default);
const TransportDelete = Vue.component('TransportDelete', require('./components/transport/TransportDelete.vue').default);
const TransportView = Vue.component('TransportView', require('./components/transport/TransportView.vue').default);
const DriversList = Vue.component('DriversList', require('./components/drivers/DriversList.vue').default);
const DriversAdd = Vue.component('DriversAdd', require('./components/drivers/DriversAdd.vue').default);
const DriversEdit = Vue.component('DriversEdit', require('./components/drivers/DriversEdit.vue').default);
const DriversDelete = Vue.component('DriversDelete', require('./components/drivers/DriversDelete.vue').default);
const DriversView = Vue.component('DriversView', require('./components/drivers/DriversView.vue').default);


//registering  Modules
Vue.use(VueRouter, VueAxios, axios);

const routes = [
    {
        name: 'Home',
        path: '/home',
        component: Home
    },
    {
        name: 'DriversList',
        path: '/drivers-page',
        component: DriversList
    },
    {
        name: 'DriversAdd',
        path: '/add-driver',
        component: DriversAdd
    },
    {
        name: 'DriversEdit',
        path: '/edit-driver/:id',
        component: DriversEdit
    },
    {
        name: 'DriversDelete',
        path: '/delete-driver',
        component: DriversDelete
    },
    {
        name: 'DriversView',
        path: '/driver/:id',
        component: DriversView
    },

    {
        name: 'TransportList',
        path: '/transport-page',
        component: TransportList
    },
    {
        name: 'TransportAdd',
        path: '/add-transport',
        component: TransportAdd
    },
    {
        name: 'TransportEdit',
        path: '/edit-transport/:id',
        component: TransportEdit
    },
    {
        name: 'TransportDelete',
        path: '/delete-transport',
        component: TransportDelete
    },
    {
        name: 'TransportView',
        path: '/transport/:id',
        component: TransportView
    },
];



const router = new VueRouter({ mode: 'history', routes: routes });

// const app = new Vue({
//     el: '#app',
//     router,
//     AppLayout
// })
new Vue(
    Vue.util.extend(
        { router },
        AppLayout
    )
).$mount("#app");
