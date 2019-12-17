<template lang="pug">
  .downloads-container(v-if="landing" :dir="locale === '_ar' ? 'rtl' : 'ltr'")
    .apps-title {{ landing['apps_title' + locale] }}
    .apps-subtitle {{ landing['apps_subtitle' + locale] }}
    .img-wrapper
      a(:href="landing.ios_link")
        img(src="/images/appstore.png")
      a(:href="landing.android_link")
        img(src="/images/google.png")
      a(href="/iptv.zip")
        img(src="/images/monitor.png")

</template>

<script>
  import DownloadCard from "../components/DownloadCard"
  import {getLanding} from "../api/landing"

  export default {
    name: "downloads",
    data() {
      return {
        landing: null
      }
    },
    components: {DownloadCard},
    created() {
      this.getLanding()

    },
    methods: {
      async getLanding() {
        const landing = await getLanding()
        this.landing = landing.landing
      }
    },
    computed: {
      locale() {
        return this.$store.state.locale
      }
    }
  }
</script>

<style lang="scss" scoped>

  .downloads-container {
   text-align: center;
    .apps-title {
      font-size: 2rem;
      font-family: 'Dubai-Bold', sans-serif;
    }
    .apps-subtitle {
      margin-bottom: 10px;
    }
  }

  .img-wrapper {
    a {
      margin: 10px;
      transition: .5s;
      img {
        width: 140px;
        height: 100px;
        object-fit: contain;
      }
      &:hover {
        opacity: .5;
      }
    }


  }
</style>
