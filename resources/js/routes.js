import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home";
import Landing from "./pages/Landing";
import Downloads from "./pages/Downloads";
import Player from "./pages/Player";

Vue.use(VueRouter);

const router = new VueRouter({
  mode: "history",
  routes: [
    {
      path: "/",
      name: "landing",
      component: Landing
    },
    {
      path: "/home",
      name: "home",
      component: Home
    },
    {
      path: "/downloads",
      name: "downloads",
      component: Downloads
    },
    {
      path: "/channel/:id",
      name: "player",
      component: Player
    }
  ]
});

export default router;
