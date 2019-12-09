<template lang="pug">
  .downloads-container
    download-card(name="for Android" url="https://play.google.com/store/apps/details?id=fun.OneThousandnights.cinema" image="/images/google.png")
    download-card(name="for iOS" url="https://apps.apple.com/us/app/1001-night/id1486071340" image="/images/appstore.png")
    download-card(name="IPTV" url="/files/iptv.zip" image="/images/monitor.png")
</template>

<script>
    import DownloadCard from "../components/DownloadCard";
    export default {
        name: "downloads",
        components: {DownloadCard}
    }
</script>

<style scoped>
  .download-item {
    font-family: 'Dubai-Regular', sans-serif;
    font-size: 2rem;
    color: #d60000;
  }
</style>
