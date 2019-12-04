<template lang="pug">

  .home-container
    home-featured
    .wrapper(v-if="categories")
      channel-row(v-for="category in categories" :channels="channels" :name="category" :key="category")
    loading-indicator(v-else)

</template>

<script>
    import HomeFeatured from "../components/HomeFeatured";
    import ChannelRow from "../components/ChannelRow";
    import LoadingIndicator from "../components/LoadingIndicator";

    export default {
        name: "home",
        created() {
            this.getChannels();
        },
        methods: {
            async getChannels() {
                const response = await axios.get('http://tv.sawadland.com:3000/api/channels')
                this.channels = response.data.channels;
                const cats = this.channels.map(channel => channel.category);
                this.categories = new Set(cats);
            },
        },
        data() {
            return {
                categories: null,
                channels: null,
            }
        },
        components: {LoadingIndicator, 'home-featured': HomeFeatured, 'channel-row': ChannelRow}
    }
</script>

<style scoped>
  .wrapper {
    padding: 50px;
  }
</style>
