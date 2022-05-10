import Vue from "vue";

// importare vue router
import VueRouter from "vue-router";

// dire a vue di usare vue-router
Vue.use(VueRouter);

// import dei componenti
import Posts from '../pages/Posts.index.vue';
import Post from '../pages/Posts.show.vue';
import Error from '../pages/Posts.error.vue';

// costante dove andranno le rotte
const routes = [
    {
        path: '/posts',
        name: 'posts.index',
        component: Posts
    },
    {
        path: '/posts/:slug',
        name: 'posts.show',
        component: Post
    },
    {
        path: '/*',
        name: 'error',
        component: Error
    }
];

// istanziare vue router
const router = new VueRouter({
    mode: 'history',
    routes
});

export default router