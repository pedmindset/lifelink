import { createRouter, createWebHistory } from "vue-router";

import DashboardView from '../components/Dashboard'
import ConferenceIndex from '../components/conference/Home'
import ConferenceCreate from '../components/conference/Create'
import ConferenceEdit from '../components/conference/Create'

const routes = [
   {
      path: '/dashboard',
      name: 'dashboard',
      component: DashboardView
   },
   {
      path: '/conferences',
      name: 'conferences.index',
      component: ConferenceIndex
   },
   {
      path: '/conference/create',
      name: 'conference.create',
      component: ConferenceCreate
   },
   {
      path: '/conference/:id/edit',
      name: 'conference.edit',
      component: ConferenceEdit,
      props: true
   }
]

export default createRouter({
   history: createWebHistory(),
   routes
})
