import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import Home from './pages/Home';
import SearchPage from './pages/SearchPage';
import Ristorante from './pages/Ristorante';
import ShopCart from './pages/ShopCart';
import NotFound from './pages/NotFound';
import About from './pages/About';

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
            path: '/il-tuo-carrello',
            name: 'shop-cart',
            component: ShopCart,
        },
        {
            path: '/chi-siamo',
            name: 'about',
            component: About,
        },
        {
            path: '/*',
            name: 'not-fount',
            component: NotFound
        }
    ],
});

export default router;