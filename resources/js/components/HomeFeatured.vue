<template lang="pug">
  .featured(v-if="homePromo" :style="style")
    router-link(to="/")
      img.logo(src="/images/logo.png")
    .bottom-gradient
    .tabs
      router-link(to="/home/live-tv")
        .tab.live-tv(:class="{highlighted: isHighlighted === 'live-tv'}") LiveTV
      router-link(to="/home/schedule")
        .tab.live-tv(:class="{highlighted: isHighlighted === 'schedule'}") Schedule
      router-link(to="/home/downloads")
        .tab.downloads(:class="{highlighted: isHighlighted === 'downloads'}") Downloads

    .watch-now
      img.channel-logo(:src="channelLogoPath" width="200px")
      router-link.button.downloads(:to="channelPath") {{ homePromo.title }}

</template>

<script>
  import {getHomePromo} from "../api/home_promo"

  export default {
    name: "home-featured",
    data() {
      return {isHighlighted: 0, homePromo: null}
    },
    watch: {
      $route(toRoute, fromRoute) {
        this.isHighlighted = toRoute.name
      }
    },
    mounted() {
      this.isHighlighted = this.$route.name
    },
    async created() {
      await this.getHomePromo()
    },
    methods: {
      async getHomePromo() {
        const homePromo = await getHomePromo()
        const {home_promo} = homePromo
        this.homePromo = home_promo
      }
    },
    computed: {
      style() {
        const {promo_image} = this.homePromo
        return `
            position: relative;
            height: 527px;
            background: url("/${promo_image}") center;
            background-size: cover;
        `
      },
      channelPath() {
        const {channel_id} = this.homePromo
        return `/channel/${channel_id}`
      },
      channelLogoPath() {
        const {channel_logo} = this.homePromo
        return `/${channel_logo}`
      }
    }
  }
</script>

<style lang="scss" scoped>

  .button {
    text-decoration: none;
    color: white;
    padding: 10px 35px;
    box-shadow: 0 0 0 2px #d60000;
    border-radius: 40px;
    transition: 0.2s;
    text-align: center;
    font-size: 1.3rem;
  }

  .button:hover {
    background: rgba(201, 201, 201, 0.219);
    box-shadow: 0 0 0 3px #d60000;
  }


  .featured {
    .bottom-gradient {
      position: absolute;
      left: 0;
      bottom: 0;
      right: 0;
      height: 150px;
      background: linear-gradient(transparent, #03090f);
    }
  }

  img.logo {
    padding: 50px;
    width: 15vw;
  }

  .tabs {
    display: flex;
    flex-direction: row;
    position: absolute;
    left: 50%;
    bottom: 50px;
    transform: translate(-50%, 0);
    cursor: pointer;
    font-family: "Dubai-Light", sans-serif;

    .tab{
      margin: 10px;
      padding: 2px;
    }

    .highlighted {
      font-family: "Dubai-Regular", sans-serif;
      border-bottom: 1px solid red;
    }
  }


  .watch-now {
    position: absolute;
    top: 40%;
    right: 25%;

    display: flex;
    flex-direction: column;
  }

  img.channel-logo {
    margin-bottom: 30px;
  }

  @media screen and (max-width: 700px){
    img.logo {
      padding: 50px 10px;
      width: 100px;
    }
  }
</style>
