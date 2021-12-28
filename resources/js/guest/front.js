window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

import vue_braintree from 'vue-braintree';
Vue.use(vue_braintree);

import App from './App';
import router from './router';

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});