<template lang="pug">
  div
    promo(
      v-if="landing"
      :image="landing.promo_image"
      :title="landing['title' + locale]"
      :subtitle="landing['subtitle' + locale]"
      :get-started="getStarted"
    )
    div(v-if="promos")
      secondary-promo(
        v-for="promo in promos"
        :key="promo.id"
        :title="promo['title' + locale]"
        :subtitle="promo['subtitle' + locale]"
        :image-url="promo.image"
        :image-position="promo.image_position"
        height="30vw"
      )

</template>
<script>
  import Promo from "../components/Promo"
  import SecondaryPromo from "../components/SecondaryPromo"
  import {getLanding} from "../api/landing"
  import {getPromos} from "../api/promo"
  import store from "../stores/store"

  export default {
    data() {
      return {
        landing: null,
        promos: null
      }
    },
    components: {
      promo: Promo,
      "secondary-promo": SecondaryPromo
    },
    created() {
      this.getLanding()
      this.getPromos()
    },
    methods: {
      async getLanding() {
        const landing = await getLanding()
        this.landing = landing.landing
      },
      async getPromos() {
        const promos = await getPromos()
        this.promos = promos.promos.map((promo, i) => ({...promo, image_position: i % 2 === 0 ? "right" : "left"}))
      }
    },
    computed: {
      getStarted() {
        return this.locale === '_ar' ? 'ابدأ' : 'Get Started'
      },
      locale() {
        return store.state.locale
      }
    }
  }
</script>


<style lang="scss">
  .nav-bar {
    z-index: 1;
    font-family: "Dubai-Light", sans-serif;
    font-size: 0.8rem;
    display: flex;
    flex-direction: row;
    position: fixed;
    padding: 50px;
    width: 100%;
    box-sizing: border-box;
    justify-content: space-between;
    align-items: center;

    min-width: 0;
    min-height: 0;
    overflow: hidden;

    .logo img {
      width: 15vw;
    }

    .left {
      display: flex;
      align-items: center;
      /*margin-right: 50px;*/

      a {
        cursor: pointer;
      }
    }

    .button {
      margin-right: 20px;
    }

  }

  .gradient {
    background: linear-gradient(rgba(0, 0, 0, 0.76), transparent);
  }

  .divider {
    display: inline-block;
    width: 2px;
    height: 30px;
    background: white;
    margin: 0 10px;
  }

  .button {
    text-decoration: none;
    font-size: 0.8vw;
    color: white;
    padding: 5px 25px;
    box-shadow: 0 0 0 1px white;
    border-radius: 20px;
    transition: 0.2s;
  }

  .button:hover {
    background: rgba(201, 201, 201, 0.219);
    box-shadow: 0 0 0 2px;
  }

  @media screen and(max-width: 700px) {

    .nav-bar {
      padding: 20px 20px;
    }
    .nav-bar .logo img {
      width: 30vw;
    }
  }

  .highlighted {
    font-family: "Dubai-Bold", sans-serif;
  }

</style>
