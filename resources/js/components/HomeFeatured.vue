<template lang="pug">
  .featured
    router-link(to="/")
      img.logo(src="/images/logo.png")
    .bottom-gradient
</template>

<script>
    export default {
        name: "home-featured"
    }
</script>

<style scoped lang="scss">

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
</style>
