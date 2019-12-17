<template lang="pug">
  div
    div(v-if="imagePosition === 'right'")
      .row(:dir="locale === '_ar' ? 'rtl' : 'ltr'")
        .text
          .head.font-dubai-medium {{ title }}
          .subhead.font-dubai-light {{ subtitle }}
        img.promo-img(:src="imageUrl")
      .divider-left
    div(v-else)
      .row(:dir="locale === '_ar' ? 'rtl' : 'ltr'")
        img.promo-img(:src="imageUrl")
        .text
          .head.font-dubai-medium {{ title }}
          .subhead.font-dubai-light {{ subtitle }}
      .divider-right
</template>
<script>
  export default {
    name: "secondary-promo",
    props: ["title", "subtitle", "imageUrl", "image-position", "height"],
    computed: {
      // style() {
      //   return `height: ${this.height}`
      // },
      locale() {
        return this.$store.state.locale
      }
    }
  }
</script>
<style lang="scss">
  .row {
    display: flex;
    justify-content: space-between;
    margin: auto;

    align-items: center;
    padding: 50px;
    max-width: 1500px;
  }

  .promo-img {
    // flex: 1;
    object-fit: contain;
    margin-left: 50px;
    height: 35vw;
  }

  .text {
    line-height: 1vw;
    font-size: 1.1vw;
    max-width: 500px;
    flex: 2;
  }

  .head {
    line-height: 1.5vw;
    margin-bottom: 20px;
    font-size: 1.8vw;
  }

  .divider-left {
    height: 1px;
    width: 40%;
    background: linear-gradient(90deg, rgb(184, 184, 184), transparent);
  }

  .divider-right {
    margin-left: auto;
    height: 1px;
    width: 40%;
    background: linear-gradient(90deg, transparent, rgb(184, 184, 184));
  }

  @media screen and (max-width: 700px) {
    .row {
      flex-direction: column;
      height: auto;
    }
    .text {
      line-height: 0.7rem;
      font-size: 0.7rem;
      max-width: 300px;
      flex: 2;
      margin: 20px;
      text-align: center;
    }
    .head {
      line-height: 1rem;
      margin-bottom: 10px;
      font-size: 1rem;
    }
    .promo-img {
      height: 70vw;
      margin: auto;
    }
  }
</style>
