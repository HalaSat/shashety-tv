import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home";
import Landing from "./pages/Landing";
import Downloads from "./pages/Downloads";
import Player from "./pages/Player";
import ChannelList from "./pages/ChannelList";
import RelatedList from "./components/RelatedList";

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
      component: Home,
      children: [
        {
          name: 'live-tv',
          path: "live-tv",
          components: {
            homeView: ChannelList
          },
        },
        {
          name: "downloads",
          path: 'downloads',
          components: {
            homeView: Downloads
          },

        }

      ]
    },

    {
      path: "/channel/:id",
      name: "player",
      component: Player,
      children: [
        {
          name: 'channels',
          path: 'all',
          components: {
            playerView: ChannelList
          }
        },
        {
          name: 'related',
          path: 'related',
          components: {
            playerView: RelatedList
          }
        }
      ]
    }
  ]
});

export default router;
