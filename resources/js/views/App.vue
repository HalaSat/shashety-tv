<template lang="pug">
  div
    nav.nav-bar.gradient
      router-link.logo(to="/")
        img(src="/images/logo.png")
      .expanded
      .left
        router-link.button.downloads(to="/home/downloads") {{ locale === '_ar' ? 'التحميلات' : 'Downloads'}}
        router-link.button.schedule(to="/home/schedule") {{ locale === '_ar' ? 'الجدول' : 'Schedule'}}
        a(@click="changeLocale('')" :class="{highlighted: locale === ''}") English
        .divider
        a(@click="changeLocale('_ar')" :class="{highlighted: locale === '_ar'}") العربية
    router-view
    app-footer
</template>
<script>
  import Footer from "../components/Footer"
  import store from '../stores/store'
  import {mapState} from "vuex"

  export default {
    components: {'app-footer': Footer},
    mounted() {
      const locale = localStorage.getItem('locale')
      this.changeLocale(locale)
    },
    methods: {
      changeLocale(locale) {
        this.$store.dispatch({type: 'changeLocale', locale: locale})
      }
    },
    computed: mapState({
      locale: state => state.locale
    })
  }
</script>
