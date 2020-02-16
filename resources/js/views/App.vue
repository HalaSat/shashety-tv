<template lang="pug">
  div
    div(v-if="$route.name !== 'kids-tv' && $route.name !== 'kids-player'")
      nav.nav-bar.gradient
        router-link.logo(:to="$route.path === '/home/live-tv' ? '/' : '/home/live-tv'")
          img(src="/images/logo.png")
        .tabs
          router-link(to="/home/live-tv")
            .tab.live-tv(:class="{highlighted: isHighlighted === 'live-tv' ||  isHighlighted === 'player' }") {{ locale === '_ar' ? 'التلفاز' : 'LiveTV'}}
          router-link(to="/home/schedule")
            .tab.live-tv(:class="{highlighted: isHighlighted === 'schedule'}") {{ locale === '_ar' ? 'الجدول' : 'Schedule'}}
          router-link(to="/home/news")
            .tab.tv-guide(:class="{highlighted: isHighlighted.includes('news')}") {{ locale === '_ar' ? 'الاخبار' : 'News'}}

        .expanded

        .left
          a.highlighted(@click="changeLocale()") {{ locale === '' ? 'العربية' : 'English' }}
      router-view
      app-footer
    transition(name="fade")
      router-view.kids-view(name="kidsView")
</template>
<script>
  import Footer from "../components/Footer"
  import {mapState} from "vuex"

  export default {
    data() {
      return {
        isHighlighted: 'live-tv',
      }
    },
    components: {'app-footer': Footer},
    mounted() {
      const locale = localStorage.getItem('locale') || ''
      this.changeLocale(locale)
      this.isHighlighted = this.$route.name
    },
    methods: {
      changeLocale() {
        this.$store.dispatch({type: 'changeLocale', locale: this.locale === '' ? '_ar' : ''})
      },
    },
    computed: mapState({
      locale: state => state.locale
    }),
    watch: {
      $route(toRoute, fromRoute) {
        this.isHighlighted = toRoute.name
      }
    },
  }
</script>


<style lang="scss" scoped>

  .expanded {
    flex: 1;
  }

  .tabs {
    display: flex;
    flex-direction: row;
    margin-left: 20px;
    cursor: pointer;
    font-family: "Dubai-Light", sans-serif;

    .tab {
      margin: 10px;
      padding: 2px;
    }

    .highlighted {
      font-family: "Dubai-Regular", sans-serif;
      border-bottom: 1px solid red;
    }
  }

  @media screen and (max-width: 700px) {
    .button.downloads {
      display: none;
    }
    .button.schedule {
      display: none;
    }
  }
</style>
