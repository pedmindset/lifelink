require('./bootstrap');
require('alpinejs');

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import { createApp } from "vue";
import { createDynamicForms } from '@asigloo/vue-dynamic-forms'
import router from './router'
import AppIndex from './components/Dashboard'

const VueDynamicForms = createDynamicForms()

createApp({
   components: {
      AppIndex
   }
}).use(router, VueDynamicForms).mount('#app')
