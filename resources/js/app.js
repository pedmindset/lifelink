require('./bootstrap');
require('alpinejs');

// window.Vue = require('vue').default;

import { createApp } from 'vue';
import router from './router';
import Laraform from 'laraform'
import { createDynamicForms } from '@asigloo/vue-dynamic-forms'

import ExampleComponent from './components/ExampleComponent.vue';
import App from './components/App.vue';

const VueDynamicForms = createDynamicForms()

const app = createApp(App);

app.use(router);
app.use(VueDynamicForms);

app.mount("#app");

// const app = new Vue({
//   el: '#app',
// })