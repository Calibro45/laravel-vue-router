import Vue from "vue";

// importare vue router
import VueRouter from "vue-router";

// dire a vue di usare vue-router
Vue.use(VueRouter);

// import dei componenti
import Posts from '../pages/Posts.index.vue';

// costante dove andranno le rotte
const routes = [
    {
        path: '/posts',
        name: 'posts.index',
        component: Posts
    }
];

// istanziare vue router
const router = new VueRouter({
    mode: 'history',
    routes
});

export default router