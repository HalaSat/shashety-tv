<template lang="pug">
  router-link.channel-link(:to="url")
    img.channel-img(:src="img")
</template>

<script>
    export default {
        name: "channel-card",
        props: ['channel'],
        computed: {
            url() {
                return `/channel/${this.channel._id}`
            },
            img() {
                return `//tv.sawadland.com:3000/uploads/images/${this.channel.image}`;
            }
        }
    }
</script>

<style scoped lang="scss">
  .channel-link {
    scroll-snap-align: start;
  }

  .channel-img {
    margin-right: 10px;
    margin-bottom: 10px;
    height: 160px;
    width: 160px;
    object-fit: cover;
    /*border-radius: 10px;*/
    /*box-shadow: 0 0 0 2px silver;*/
    /*border: 1px solid silver;*/
    transition: .5s;

    &:hover {
      transform: scale(1.1);
    }
  }

</style>
