<template lang="pug">
  .channel-list-container(v-if="categories && channels")
    channel-row(v-for="category in categories" :channels="channels" :category="category" :key="category.id" :locale="locale")
  loading-indicator(v-else)
</template>

<script>
  import ChannelRow from "@/js/components/ChannelRow"
  import LoadingIndicator from "@/js/components/LoadingIndicator"
  import {getCategories} from "@/js/api/category"
  import {getChannels} from "@/js/api/channel"
  import store from "../stores/store"

  export default {
    name: "channel-list",
    components: {LoadingIndicator, ChannelRow},
    data() {
      return {
        categories: null,
        channels: null
      }
    },
    mounted() {
      this.locale = localStorage.getItem('locale')
    },
    created() {
      this.getChannels()
    },
    methods: {
      async getChannels() {
        const categories = await getCategories()
        this.categories = categories.categories
        const channels = await getChannels()
        this.channels = channels.channels
      },
    },
    computed: {
      locale() {
        return store.state.locale
      }
    }
  }
</script>

<style scoped>

</style>
