<template lang="pug">

  .home-container
    home-featured
    .wrapper
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

  @media screen and (max-width: 700px) {
    .wrapper {
      padding: 10px;
    }
  }
</style>
