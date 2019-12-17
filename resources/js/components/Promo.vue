<template lang="pug">
  .promo
    img.first-promo-img( :src="image")
    .promo-text
      div(class="headline font-dubai-medium") {{ title || 'A Unique Way to Enjoy' }}
      div(class="no-margin subtitle font-dubai-light") {{ subtitle || 'More Than 200 Live Channels' }}
      router-link(to="/home/live-tv")
        .play-row
          play-button
          div(class="get-started subtitle font-dubai-light") {{ getStarted }}
</template>
<script>
  import PlayButton from "./PlayButton"

  export default {
    components: {"play-button": PlayButton},
    props: {
      image: {type: String, required: true},
      title: {type: String},
      subtitle: {type: String},
      getStarted: {type: String}
    },
  }
</script>
<style lang="scss" scoped>
  .get-started {
    margin-left: 20px;
  }

  .play-row {
    margin-top: 30px;
    display: flex;
    align-items: center;
  }

  .promo {
    // overflow: hidden;
    position: relative;
    box-sizing: border-box;
  }

  .first-promo-img {
    box-sizing: border-box;
    width: 100%;
    height: 100vh;
    margin-top: -10px;
    object-fit: cover;
  }

  .promo-text {
    position: absolute;
    top: 50%;
    left: 50px;
  }

  .headline {
    margin: 0;
    font-size: 3.8vw;
    line-height: 3.6rem;
  }

  .subtitle {
    font-size: 2.3vw;
  }

  .no-margin {
    margin: 0;
  }

  @media screen and (max-width: 700px) {
    .headline {
      margin: 0;
      font-size: 2.2rem;
      line-height: 2.2rem;
    }

    .subtitle {
      font-size: 1.4rem;
    }
  }
</style>
