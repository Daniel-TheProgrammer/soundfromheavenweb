/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { store } from './store';
import Fragment from 'vue-fragment'
import VModal from 'vue-js-modal';
import Vue from 'vue';
window.Vue = require('vue').default;
Vue.use(Fragment.Plugin)
Vue.use(VModal);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('voting', require('./components/voting/Voting.vue').default);
Vue.component('new-voting', require('./components/voting/NewVoting.vue').default);
Vue.component('navigation', require('./components/layout/Navigation.vue').default);
Vue.component('sfooter', require('./components/layout/Footer.vue').default);
Vue.component('home', require('./components/pages/Home.vue').default);
Vue.component('aboutus', require('./components/pages/AboutUs.vue').default);
Vue.component('competition', require('./components/pages/Competition.vue').default);
Vue.component('contactus', require('./components/pages/Contactus.vue').default);
Vue.component('contestants', require('./components/pages/Contestants.vue').default);
Vue.component('gallery', require('./components/pages/Gallery.vue').default);
Vue.component('tracks',require('./components/pages/Tracks.vue').default);
Vue.component('tickets',require('./components/pages/Tickets.vue').default);

Vue.component('test',require('./components/test/Test.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    store,
    mounted(){
        
    }
});
