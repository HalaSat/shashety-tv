<template lang="pug">
  .featured
    router-link(to="/")
      img.logo(src="/images/logo.png")
    .bottom-gradient
    .tabs
      router-link(to="/home/live-tv")
        .tab.live-tv(:class='{highlighted: isHighlighted}') Live TV
      router-link(to="/home/downloads")
        .tab.downloads(:class="{highlighted: !isHighlighted}") Downloads

    .watch-now
      img.channel-logo(src="/images/home/bein.png" width="200px")
      router-link.button.downloads(to="/channel/5db5400228f9c075121f58c0") Watch Now

</template>

<script>
    export default {
        name: "home-featured",
        data() {
            return {isHighlighted: true};
        },
        watch: {
            $route(toRoute, fromRoute) {
                this.isHighlighted = toRoute.name === 'live-tv';
            }
        },
        mounted() {
            this.isHighlighted = this.$route.name === 'live-tv';
        }
    }
</script>

<style scoped lang="scss">

  .button {
    text-decoration: none;
    color: white;
    padding: 10px 35px;
    box-shadow: 0 0 0 2px #d60000;
    border-radius: 20px;
    transition: 0.2s;
    text-align: center;
    font-size: 1.3rem;
  }

  .button:hover {
    background: rgba(201, 201, 201, 0.219);
    box-shadow: 0 0 0 3px #d60000;
  }


  .featured {
    position: relative;
    height: 527px;
    background: url("/images/home/featured.png") center;
    background-size: cover;

    .bottom-gradient {
      position: absolute;
      left: 0;
      bottom: 0;
      right: 0;
      height: 60px;
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
    .tab {
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
    top: 45%;
    right: 25%;

    display: flex;
    flex-direction: column;
  }

  img.channel-logo {
    margin-bottom: 30px;
  }

</style>
