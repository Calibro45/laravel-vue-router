import Vue from "vue";

// importare vue router
import VueRouter from "vue-router";

// dire a vue di usare vue-router
Vue.use(VueRouter);

// costante dove andranno le rotte
const routes = [];

// istanziare vue router
const router = new VueRouter({
    mode: 'history',
    routes
});

export default router