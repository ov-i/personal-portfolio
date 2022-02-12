import { createApp } from 'vue';
import App from "./Application";
import { createRouter, createWebHistory } from 'vue-router'
import { routes } from "./routes/routes";

const app = createApp(App)

Vue.component('app', App)
Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: 'history',
})
