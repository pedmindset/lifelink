import { createRouter, createWebHistory } from "vue-router";

import DashboardView from '../components/Dashboard'
import ConferenceIndex from '../components/conference/Home'
import ConferenceCreate from '../components/conference/Create'
import ConferenceEdit from '../components/conference/Create'
import AluminiaHome from '../components/aluminia/Home'
import SettingsView from '../components/Settings'

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
      path: '/officials',
      name: 'officials',
      component: ConferenceEdit,
   },
   {
      path: '/members',
      name: 'members',
      component: ConferenceEdit,
   },
   {
      path: '/aluminias',
      name: 'aluminias.index',
      component: AluminiaHome,
   },
   {
      path: '/payments',
      name: 'payments',
      component: ConferenceEdit,
   },
   {
      path: '/awards-citations',
      name: 'award.citation',
      component: ConferenceEdit,
   },
   {
      path: '/settings',
      name: 'settings',
      component: SettingsView,
   }
]

export default createRouter({
   history: createWebHistory(),
   routes
})
