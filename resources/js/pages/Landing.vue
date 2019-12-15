<template lang="pug">
  div
    navbar
    promo(v-if="landing" :image="landing.promo_image" :title="landing.title" :subtitle="landing.subtitle")
    div(v-if="promos")
      secondary-promo(
        v-for="promo in promos"
        :key="promo.id"
        :title="promo.title"
        :subtitle="promo.subtitle"
        :image-url="promo.image"
        :image-position="promo.image_position"
        height="20vw"
      )

</template>
<script>
  import NavBar from "../components/NavBar"
  import Promo from "../components/Promo"
  import SecondaryPromo from "../components/SecondaryPromo"
  import {getLanding} from "../api/landing"
  import {getPromos} from "../api/promo"

  export default {
    data() {
      return {
        landing: null,
        promos: null
      }
    },
    components: {
      navbar: NavBar,
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
        console.log(this.landing)
      },
      async getPromos() {
        const promos = await getPromos()
        this.promos = promos.promos.map((promo, i) => ({ ...promo, image_position:  i % 2 === 0 ? "right" : "left" }))
      }
    }
  }
</script>

