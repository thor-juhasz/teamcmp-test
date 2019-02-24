require('../sass/app.scss');
require('@fortawesome/fontawesome-free/js/all');

import Vue from 'vue';
import App from './App';
import router from './router';

// Progressbar integration
import NProgress from 'vue-nprogress'
Vue.use(NProgress);
const nprogress = new NProgress({ });

// Vue bootstrap integration
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

const app = new Vue({
    template: '<App ref="rootApp"/>',
    components: { App },
    nprogress,
    router
});
app.$mount('#app');