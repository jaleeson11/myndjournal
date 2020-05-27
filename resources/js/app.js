/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

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
Vue.component('form-wizard', require('./components/FormWizard.vue').default);
Vue.component('tab-content', require('./components/TabContent.vue').default);
Vue.component('thought-journal-entry', require('./components/ThoughtJournalEntry.vue').default);
Vue.component('thought-journal-edit', require('./components/ThoughtJournalEdit.vue').default);
Vue.component('main-content', require('./components/Main.vue').default);
Vue.component('side-bar', require('./components/SideBar.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);
Vue.component('gratitude-journal-entry', require('./components/GratitudeJournalEntry.vue').default);
Vue.component('gratitude-journal-edit', require('./components/GratitudeJournalEdit.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data() {
        return {
            values: [230, 308, 520, 130, 200]
        }
    },
});
