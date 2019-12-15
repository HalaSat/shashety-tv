<template lang="pug">
  .schedule-game-wrapper
    .header
      .logo
        img(:src="leagueLogo")
      .title {{ league.competition.name + ' '}}
        span ({{ league.competition["totalGames"]}})
        .countryName {{ league.country.name }}
    .divider
    .games-wrapper
     match(:key="game.id" v-for="game in league.games" :match="game")

</template>

<script>
import Match from "./Match";

export default {
  name: "schedule-game",
  props: {
    league: { type: Object, required: true }
  },
  components: { Match },
  computed: {
    leagueLogo() {
      const id = this.league.competition.id;
      console.log(id);
      return `https://imagecache.365scores.com/image/upload/f_auto,w_72,h_72,c_limit,q_auto:eco,d_Countries:Round:1.png/Competitions/Light/${id}`;
    }
  }
};
</script>

<style lang="scss" scoped>
.schedule-game-wrapper {
  /*max-width: 1100px;*/
  margin: 0 auto 50px auto;
}

.header {
  display: flex;
  align-items: center;

  .title {
    font-family: "Dubai-Medium", sans-serif;
    margin: 20px;

    span {
      font-family: "Dubai-Light", sans-serif;
    }
    .countryName {
      font-family: "Dubai-Light", sans-serif;
      color: silver;
      font-size: 1rem;
      line-height: 1rem;
    }
  }

  .logo {
    width: 50px;
    height: 50px;
    filter: drop-shadow(1px 1px 0 white) drop-shadow(-1px -1px 0 white);
    /*background-color: #fff;*/
    /*border-radius: 50%;*/
    text-align: center;
    padding: 10px;

    img {
      width: 50px;
      height: 50px;
      object-fit: contain;
    }
  }
}

.divider {
  height: 1px;
  margin: 25px 0;
  background: linear-gradient(90deg, silver, transparent);
}
.games-wrapper {
  font-family: "Dubai-Light", sans-serif;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 0.9rem;
  flex-wrap: wrap;
}
</style>
