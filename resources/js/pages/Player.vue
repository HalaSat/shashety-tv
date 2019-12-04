<template lang="pug">
  .player-page
    .navbar
      router-link(to="/home")
        img.logo(src="/images/logo.png")
    .channel-container
      .player-container
        #player
      .player-channel-row-title All
      .player-channel-row(:v-if="channels")
        channel-card(v-for="channel in channels" :channel="channel" :key="channel._id")

</template>

<script>

    import axios from 'axios';
    import ChannelCard from "../components/ChannelCard";

    export default {
        name: "player",
        components: {ChannelCard},
        data() {
            return {channel: null, channels: null, player: null};
        },
        watch: {
            $route (toRoute, fromRoute) {
                this.player.destroy();
                this.getChannel();
            }
        },
        methods: {
            getChannel() {
                axios.get(`http://tv.sawadland.com:3000/api/channels/${this.$route.params.id}`).then(response => {
                    this.channel = response.data.channel;
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
            this.getChannel();
            this.getChannels();
        },

    }
</script>

<style lang="scss" scoped>
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


</style>
