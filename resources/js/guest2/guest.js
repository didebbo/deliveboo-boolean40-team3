window.Vue = require('vue');
import router from './router'

import App from './App.vue'

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});