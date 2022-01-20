require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from "vue";
import router from './router'
import AppIndex from './components/Dashboard'

createApp({
   components: {
      AppIndex
   }
}).use(router).mount('#app')
