import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import Home from './pages/Home';
import SearchPage from './pages/SearchPage';
import Ristorante from './pages/Ristorante';
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
            path: '/search',
            name: 'search',
            component: SearchPage,
        },
        {
            path: '/ristorante/:id',
            name: 'ristorante',
            component: Ristorante,
        },
        {
            path: '/*',
            name: 'not-fount',
            component: NotFound
        }
    ],
});

export default router;