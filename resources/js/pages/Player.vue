<template lang="pug">
  .player-page
    .navbar
      router-link(to="/home/live-tv")
        img.logo(src="/images/logo.png")
    .channel-container
      .player-container
        #player
    .wrapper
      ChannelRow(v-if="channels && channel" :name="channel.category" :channels="channels")
    // .tabs
    //  router-link(:to="relatedChannelsRoute")
    //    .tab.downloads(:class="{highlighted: !isHighlighted}") Related
    //  router-link(:to="allChannelsRoute")
    //    .tab.live-tv(:class='{highlighted: isHighlighted}') All

    //router-view.playerView

</template>

<script>

    import axios from 'axios';
    import ChannelCard from "../components/ChannelCard";
    import ChannelList from "./ChannelList";
    import ChannelRow from "../components/ChannelRow";

    export default {
        name: "player",
        components: {ChannelRow, ChannelList, ChannelCard},
        data() {
            return {channel: null, channels: null, player: null, isHighlighted: true};
        },
        watch: {
            $route (toRoute, fromRoute) {
                this.isHighlighted = toRoute.name === 'channels';
                this.player.destroy();
                this.getChannel();
            }
        },
        methods: {
            getChannel() {
                axios.get(`http://tv.sawadland.com:3000/api/channels/${this.$route.params.id}`).then(response => {
                    this.channel = response.data.channel;
                    if (this.player) {
                        this.player.destroy();
                    }
                    this.player = new Clappr.Player({
                        source: this.channel.url,
                        parentId: "#player",
                        poster: `http://tv.sawadland.com:3000/uploads/images/${this.channel.image}`,
                        width: '100%',
                        height: '100%',
                        autoPlay: true,
                    });
                });
            },
            getChannels() {
                axios.get('http://tv.sawadland.com:3000/api/channels').then(response => {
                    this.channels = response.data.channels;
                });
            },
        },
        mounted() {
            this.isHighlighted = this.$route.name === 'channels';
            this.getChannel();
            this.getChannels();
        },
        computed: {
            relatedChannelsRoute() {
                return `/channel/${this.$route.params.id}/related`;
            },

            allChannelsRoute() {
                return `/channel/${this.$route.params.id}/all`;
            }
        },

        destroyed() {
            this.player.destroy();
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
