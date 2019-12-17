import "./bootstrap"
import Vue from "vue"

import Routes from "@/js/routes.js"

import App from "@/js/views/App"

import store from "./stores/store"

const app = new Vue({
  el: "#app",
  router: Routes,
  store,
  render: h => h(App)
})

export default app
