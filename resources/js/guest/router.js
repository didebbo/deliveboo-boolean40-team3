import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import Home from './pages/Home';
import About from './pages/About';
import Contact from './pages/Contact';
import SinglePost from './pages/SinglePost';
import SingleCategory from './pages/SingleCategory';
import NotFound from './pages/NotFound';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/chi-siamo',
            name: 'about',
            component: About,
        },
        {
            path: '/contatti',
            name: 'contact',
            component: Contact,
        },
        {
            path: '/posts/:slug',
            name: 'single-post',
            component: SinglePost
        },
        {
            path: '/categories/:slug',
            name: 'single-category',
            component: SingleCategory
        },
        {
            path: '/*',
            name: 'not-fount',
            component: NotFound
        }
    ],
});

export default router;