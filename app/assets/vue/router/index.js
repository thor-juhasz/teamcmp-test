import Vue from 'vue';
import VueRouter from 'vue-router';
import Profile from '../views/Profile';
import Chat from '../views/Chat';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/profile', component: Profile },
        { path: '/chat', component: Chat },

        { path: '*', redirect: '/profile' }
    ],
});