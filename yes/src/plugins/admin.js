import Vue from "vue";
import VuetifyAdmin from "vuetify-admin";

import "vuetify-admin/src/loader";

import {
  laravelDataProvider,
  sanctumAuthProvider,
} from "vuetify-admin/src/providers";
import { en, fr } from "vuetify-admin/src/locales";

import router from "@/router";
import routes from "@/router/admin";
import store from "@/store";
import i18n from "@/i18n";
import resources from "@/resources";
import axios from "axios";
import trimEnd from "lodash/trimEnd";

/**
 * Load Admin UI components
 */
Vue.use(VuetifyAdmin);

/**
 * Axios instance
 */
const baseURL = process.env.VUE_APP_API_URL || "http://localhost:8000";

const http = axios.create({
  baseURL,
  withCredentials: true,
  headers: { "X-Requested-With": "XMLHttpRequest" },
});

/**
 * Init admin
 */
export default new VuetifyAdmin({
  router,
  store,
  i18n,
  title: "Life Link GH",
  routes,
  locales: {
    en,
    fr,
  },
  translations: ["en", "fr"],
  dataProvider: laravelDataProvider(http),
  authProvider: sanctumAuthProvider(http),
  resources,
  http,
  options: {
    dateFormat: "long",
    tinyMCE: {
      language: navigator.language.replace("-", "_"),
      imageUploadUrl: "/api/upload",
      fileBrowserUrl: `${trimEnd(baseURL, "/")}/elfinder/tinymce5`,
    },
  },
});
