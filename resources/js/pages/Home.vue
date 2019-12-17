<template lang="pug">

  .home-container
    home-featured
    .wrapper
      transition(name="fade")
        router-view.home-view(name="homeView")


</template>

<script>
    import HomeFeatured from "../components/HomeFeatured";
    import LoadingIndicator from "../components/LoadingIndicator";
    import ChannelList from "./ChannelList";

    export default {
        name: "home",
        components: {ChannelList, LoadingIndicator, HomeFeatured}
    }
</script>

<style scoped>
  .wrapper {
    padding: 50px;
  }
  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
  }
  @media screen and (max-width: 700px) {
    .wrapper {
      padding: 10px;
    }
  }
</style>
