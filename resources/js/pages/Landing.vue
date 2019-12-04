<template lang="pug">
  div
    navbar
    promo
    secondary-promo(
      head="1001 Nights TV Guide"
      subhead="A new feature that shows TV schedule of each channel in a clear way"
      image-url="images/second.png"
      image-position="right"
      height="20vw"
    )
    secondary-promo(
      head="Football Matches Schedule"
      subhead="A new feature that shows TV schedule of each channel in a clear way"
      image-url="images/third.png"
      image-position="left"
      height="40vw"
    )
    secondary-promo(
      head="Kids Mode"
      subhead="A new feature that shows TV schedule of each channel in a clear way"
      image-url="images/fourth.png"
      image-position="right"
      height="40vw"
    )

    secondary-promo(
      head="Download the Application On all devices"
      subhead="A new feature that shows TV schedule of each channel in a clear way"
      image-url="images/fifth.png"
      image-position="left"
      height="20vw"
    )


</template>
<script>
    import NavBar from "../components/NavBar";
    import PlayButton from "../components/PlayButton";
    import Promo from "../components/Promo";
    import SecondaryPromo from "../components/SecondaryPromo";

    export default {
        components: {
            navbar: NavBar,
            promo: Promo,
            "secondary-promo": SecondaryPromo
        }
    };
</script>
<style lang="scss" scoped>

</style>
