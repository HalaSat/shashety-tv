<template lang="pug">
  .channel-row-wrapper
    .channel-row(:class="collapsed ? 'collapse' : ''" v-if="channels")
      channel-card(v-for="channel in data" :channel="channel" :key="channel.id")
    .see-more(v-on:click="collapse")
      span {{ collapsed ? 'See more' : 'See less' }}
      down-arrow(:down="!collapsed")

</template>

<script>
    import ChannelCard from "./ChannelCard";
    import DownArrow from "./DownArrow";

    export default {
        name: "related-list",
        data() {
            console.log('this is data');
            return {
                collapsed: true,
                data:  this.channels.filter(channel => channel.category === this.name)
            };
        },
        props: {
            channelId: {type: String}
        },
        components: {DownArrow, ChannelCard},
        methods: {
            collapse() {
                this.collapsed = !this.collapsed;
            },

        },
        mounted() {
            console.log('this is data');
            console.log(this.$route.params);
        }
    }
</script>

<style scoped lang="scss">
  .channel-row-wrapper {
    margin-bottom: 10px;
  }
  .collapse {
    overflow: hidden;
    height: 12.5vw;
  }

  .see-more {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .see-more span {
    display: inline-block;
    font-size: 1.1rem;
    cursor: pointer;
    margin-right: 8px;
    color: #d60000;
    font-family: "Dubai-Regular", sans-serif;

    /*&:hover {*/
    /*  color: red;*/
    /*}*/
  }


  .title {
    display: inline-block;
    font-size: 2.1rem;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .channel-row {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
  }


  @media screen and (max-width: 700px) {
    .collapse {
      overflow: hidden;
      height: 28vw;
    }
  }
</style>
