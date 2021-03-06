/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

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
Vue.component('editor', require('./components/Editor.vue').default);
Vue.component('image-drawer', require('./components/ImageDrawer.vue').default);
Vue.component('front-page', require('./components/FrontPage.vue').default);
Vue.component('Navbar', require('./components/Navbar.vue').default);
Vue.component('Discussion', require('./components/Discussion.vue').default);
Vue.component('Date', require('./components/Date.vue').default);
Vue.component('FeaturedPost', require('./components/FeaturedPost.vue').default);
Vue.component('InfiniteScroll', require('./components/InfiniteScroll.vue').default);
Vue.component('footered', require('./components/footered.vue').default);
Vue.component('FullSpinner', require('./components/FullSpinner.vue').default);
Vue.component('search', require('./components/Search.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
