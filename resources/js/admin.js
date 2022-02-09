import Vue from 'vue';
import App from "./Application";
import VueRouter from 'vue-router'
import { routes } from "./components/routes/routes";

Vue.component('app', App)
Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: 'history',
})

const app = new Vue({
    el: '#admin',
    router,
    render: h => h(App)
})

