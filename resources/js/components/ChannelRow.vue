<template lang="pug">
  .channel-row-wrapper
    .title {{ name }}
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
        name: "channel-row",
        data() {
            return {
                collapsed: true,
                data:  this.channels.filter(channel => channel.category === this.name)
            };
        },
        props: {
            'channels': {type: Array},
            'name': {type: String, default: 'Featured'}
        },
        components: {DownArrow, 'channel-card': ChannelCard},
        methods: {
            collapse() {
                this.collapsed = !this.collapsed;
            },

        }
    }
</script>

<style scoped lang="scss">
  .channel-row-wrapper {
    margin-bottom: 20px;
  }
  .collapse {
    overflow: hidden;
    height: 170px;
  }

  .see-more {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .see-more span {
    display: inline-block;

    cursor: pointer;
    margin-right: 8px;
    color: #d60000;
    font-family: "Dubai-Light", sans-serif;

    /*&:hover {*/
    /*  color: red;*/
    /*}*/
  }


  .title {
    display: inline-block;
    font-size: 1.6rem;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .channel-row {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
  }
</style>
