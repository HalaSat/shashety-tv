<template lang="pug">
  .channel-list-container(v-if="categories")
    channel-row(v-for="category in categories" :channels="channels" :name="category" :key="category")
  loading-indicator(v-else)
</template>

<script>
    import ChannelRow from "../components/ChannelRow";
    import LoadingIndicator from "../components/LoadingIndicator";
    export default {
        name: "channel-list",
        components: {LoadingIndicator, ChannelRow},
        data() {
            return {
                categories: null,
                channels: null,
            }
        },
        created() {
            console.log(this.$route);
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
    }
</script>

<style scoped>

</style>
