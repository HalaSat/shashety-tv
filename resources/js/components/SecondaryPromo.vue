<template lang="pug">
  div
    div(v-if="imagePosition === 'right'")
      .row
        .text
          .head.font-dubai-medium {{ title }}
          .subhead.font-dubai-light {{ subtitle }}
        img.promo-img(:src="imageUrl" :style="style")
      .divider-left
    div(v-else)
      .row
        img.promo-img(:src="imageUrl" :style="style")
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
    style() {
      return `height: ${this.height}`;
    }
  }
};
</script>
<style lang="scss">
.row {
  display: flex;
  justify-content: space-between;

  align-items: center;
  padding: 50px;
}

.promo-img {
  // flex: 1;
  height: inherit;
  object-fit: contain;
  margin-left: 50px;
}

.text {
  line-height: 1vw;
  font-size: 1.1vw;
  max-width: 300px;
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
  }
  .head {
    line-height: 1rem;
    margin-bottom: 10px;
    font-size: 1rem;
  }
}
</style>
