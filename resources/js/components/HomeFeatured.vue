<template lang="pug">
  .featured(v-if="homePromo" :style="style")
    .bottom-gradient
    .watch-now
      img.channel-logo(:src="channelLogoPath" width="200px" height="100px")
      router-link.button.channel-button(:to="channelPath") {{ countDown || (locale === '_ar' ? 'شاهد الان' : 'Watch Now') }}
      .watch-now-title {{ homePromo['title' + locale] }}

</template>

<script>
  import {getHomePromo} from "../api/home_promo"
  import store from "../stores/store"
  import {getGameDate} from "../api/game_date"

  export default {
    name: "home-featured",
    data() {
      return {
        isHighlighted: 'live-tv',
        homePromo: null,
        countDown: null
      }
    },
    watch: {
      $route(toRoute, fromRoute) {
        this.isHighlighted = toRoute.name
      }
    },
    mounted() {
      this.isHighlighted = this.$route.name
    },
    async created() {
      this.startCountDown()
      await this.getHomePromo()
    },
    methods: {
      async getHomePromo() {
        const homePromo = await getHomePromo()
        const {home_promo} = homePromo
        this.homePromo = home_promo
      },
      async startCountDown() {
        let countDownDateString
        try {
          const data = await getGameDate()
          countDownDateString = data.game_date.date
        } catch (e) {
          countDownDateString = null
        }
        if (countDownDateString) {
          const countDownDate = new Date(countDownDateString).getTime()
          // Update the count down every 1 second
          const x = setInterval(() => {

            // Get today's date and time
            const now = new Date().getTime()

            // Find the distance between now and the count down date
            const distance = countDownDate - now

            // Time calculations for days, hours, minutes and seconds
            let hours = Math.floor(distance / (1000 * 60 * 60))
            // if (hours < 10) {
            //   hours = `0${hours}`
            // }
            // const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
            // if (minutes < 10) {
            //   minutes = `0${hours}`
            // }
            let seconds = Math.floor((distance % (1000 * 60)) / 1000)
            // if (seconds < 10) {
            //   seconds = `0${hours}`
            // }
            // Display the result in the element with id="demo"
            this.countDown = hours + " : "
              + minutes + " : " + seconds
            console.log(this.countDown)

            // If the count down is finished, write some text
            if (distance < 0) {
              clearInterval(x)
              this.countDown = null
            }
          }, 1000)
        }
      }
    },
    computed: {
      style() {
        const {promo_image} = this.homePromo
        return `
            position: relative;
            height: 300px;
            background: url("${promo_image}") center;
            background-size: cover;
        `
      },
      channelPath() {
        const {channel_id} = this.homePromo
        return `/channel/${channel_id}`
      },
      channelLogoPath() {
        return this.homePromo.channel_logo
      },
      locale() {
        return store.state.locale
      }
    }
  }
</script>

<style lang="scss" scoped>

  .button {
    text-decoration: none;
    color: white;
    padding: 10px 35px;
    box-shadow: 0 0 0 2px #a80707;
    border-radius: 40px;
    transition: 0.2s;
    text-align: center;
    font-size: 1.3rem;
  }

  .button:hover {
    background: rgba(201, 201, 201, 0.219);
    box-shadow: 0 0 0 3px #a80707;
  }

  .button.channel-button {
    &:hover {
      background: #a80707;
    }
  }


  .featured {
    .bottom-gradient {
      position: absolute;
      left: 0;
      bottom: 0;
      right: 0;
      height: 150px;
      background: linear-gradient(transparent, #03090f);
    }
  }

  img.logo {
    padding: 50px;
    width: 15vw;
  }

  .watch-now {
    position: absolute;
    top: 30%;
    right: 25%;

    display: flex;
    flex-direction: column;
    .watch-now-title {
      margin: 10px;
      font-size: 1.5rem;
      text-align: center;
    }
  }

  img.channel-logo {
    object-fit: contain;
    margin-bottom: 30px;
  }

  @media screen and (max-width: 700px) {
    img.logo {
      padding: 50px 10px;
      width: 100px;
    }
  }
</style>
