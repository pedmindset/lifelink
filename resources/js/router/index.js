import { createRouter, createWebHistory } from "vue-router";

import Dashboard from '../components/admin/Dashboard.vue';
import ConferenceHome from '../components/admin/conference/Home.vue';
import ConferenceShow from '../components/admin/conference/Show.vue';

const routes = [
   {
      path: '/admin/dashboard',
      name: 'dashboard',
      component: Dashboard
   },
   {
      path: '/admin/conferences',
      name: 'conference.index',
      component: ConferenceHome
   },
   {
      path: '/admin/conference/show',
      name: 'conference.show',
      component: ConferenceShow
   },
   {
      path: '/admin/conference/staff',
      name: 'conference.staff',
      component: ConferenceShow
   },
   {
      path: '/admin/conference/members',
      name: 'conference.members',
      component: ConferenceShow
   },
   {
      path: '/admin/payments',
      name: 'payment.index',
      component: ConferenceShow
   },
   {
      path: '/admin/payments',
      name: 'payment.show',
      component: ConferenceShow
   },
   {
      path: '/admin/aluminia',
      name: 'aluminia.index',
      component: ConferenceShow
   },
   {
      path: '/admin/aluminia/show',
      name: 'aluminia.show',
      component: ConferenceShow
   },
   {
      path: '/admin/award-and-citation',
      name: 'award.citation',
      component: ConferenceShow
   },
   {
      path: '/admin/award-and-citation/show',
      name: 'award.show',
      component: ConferenceShow
   },
];

export default createRouter({
   history: createWebHistory(),
   routes
})