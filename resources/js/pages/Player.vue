<template lang="pug">
  .player-page
    .navbar
      router-link(to="/home/live-tv")
        img.logo(src="/images/logo.png")
    .channel-container
      .player-container
        #player
    .wrapper
      ChannelRow(v-if="channels && channel" :category="category" :channels="channels")
    // .tabs
    //  router-link(:to="relatedChannelsRoute")
    //    .tab.downloads(:class="{highlighted: !isHighlighted}") Related
    //  router-link(:to="allChannelsRoute")
    //    .tab.live-tv(:class='{highlighted: isHighlighted}') All

    //router-view.playerView

</template>

<script>

  import ChannelCard from "../components/ChannelCard"
  import ChannelList from "./ChannelList"
  import ChannelRow from "../components/ChannelRow"
  import {getChannel, getChannelsByCategory} from "@/js/api/channel"
  import {getCategory} from "../api/category"

  export default {
    name: "player",
    components: {ChannelRow, ChannelList, ChannelCard},
    data() {
      return {
        channel: null,
        channels: null,
        player: null,
        category: null,
        isHighlighted: true
      }
    },
    watch: {
      $route(toRoute, fromRoute) {
        this.isHighlighted = toRoute.name === 'channels'
        this.player.destroy()
        this.getChannel()
      }
    },
    methods: {
      async getChannel() {
        const channel = await getChannel(this.$route.params.id)
        this.channel = channel.channel
        if (this.player) {
          this.player.destroy()
        }
        this.player = new Clappr.Player({
          source: this.channel.url,
          parentId: "#player",
          poster: this.channel.image,
          width: '100%',
          height: '100%',
          autoPlay: true,
        })
      },
      async getChannels() {
        const channels = await getChannelsByCategory(this.channel.category_id)
        this.channels = channels.channels
      },
      async getCategory() {
        const category = await getCategory(this.channel.category_id)
        this.category = category.category
      }
    },
    async created() {
      this.isHighlighted = this.$route.name === 'channels'
      await this.getChannel()
      await this.getCategory()
      await this.getChannels()
    },
    computed: {
      relatedChannelsRoute() {
        return `/channel/${this.$route.params.id}/related`
      },

      allChannelsRoute() {
        return `/channel/${this.$route.params.id}/all`
      }
    },

    destroyed() {
      this.player.destroy()
    }

  }
</script>

<style lang="scss" scoped>
  .wrapper {
    padding: 50px;
  }

  @media screen and (max-width: 700px) {
    .wrapper {
      padding: 10px;
    }
  }

  .navbar {
    padding: 50px;
  }

  img.logo {
    width: 15vw;
  }

  .channel-container {
    margin: auto;
    max-width: 1000px;
  }

  #player {
    max-width: 1000px;
    width: 100%;
    max-height: 600px;
    height: 500px;
  }

  .player-container {
    display: flex;
    justify-content: center;
    padding-bottom: 50px;
  }

  .player-channel-row {
    padding: 10px;
    display: flex;
    flex-direction: row;
    /*height: 170px;*/
    overflow-x: scroll;

    scroll-snap-type: x mandatory;
  }

  .player-channel-row-title {
    display: inline-block;
    font-size: 1.6rem;
    font-weight: bold;
    margin-bottom: 10px;
    margin-left: 10px;
  }

  .tabs {
    display: flex;
    justify-content: center;
    flex-direction: row;
    cursor: pointer;
    font-family: "Dubai-Light", sans-serif;

    .tab {
      margin: 10px;
      padding: 2px;
    }

    .highlighted {
      font-family: "Dubai-Regular", sans-serif;
      border-bottom: 1px solid red;
    }
  }


</style>
