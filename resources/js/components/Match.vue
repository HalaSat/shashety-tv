<template lang="pug">
  .match
    .games
      .game
        img.logo(:src="homeImg")
        .title {{ match.homeCompetitor.name }}
      .game
        img.logo(:src="awayImg")
        .title {{ match.awayCompetitor.name }}

    .game-info
      .time {{ time }}
      .stadium {{ match.statusText }}
    .games.font-dubai-bold
      .game
        .title {{ match.homeCompetitor.score >= 0 ? match.homeCompetitor.score : '--' }}
      .game
        .title {{ match.awayCompetitor.score >= 0 ? match.awayCompetitor.score : '--' }}
</template>

<script>
import moment from "moment";

const imageUrl =
  "https://imagecache.365scores.com/image/upload/f_auto,w_96,h_96,c_limit,q_auto:eco,d_Competitors:default1.png/Competitors";
export default {
  name: "match",
  props: { match: { type: Object, required: true } },
  computed: {
    homeImg() {
      const { homeCompetitor } = this.match;
      const { id } = homeCompetitor;
      return `${imageUrl}/${id}`;
    },
    awayImg() {
      const { awayCompetitor } = this.match;
      const { id } = awayCompetitor;
      return `${imageUrl}/${id}`;
    },
    time() {
      return moment(this.match.startTime).format("h:mm a");
    }
  }
};
</script>

<style scoped lang="scss">
.match {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 500px;
  width: 100%;
}

.game-info {
  .time {
    text-align: center;
    font-family: "Dubai-Medium", sans-serif;
  }

  .stadium {
    text-align: center;
    font-family: "Dubai-Light", sans-serif;
  }

  // margin: 0 60px;
}

.games .game {
  display: flex;
  align-items: center;
  margin: 20px 0;
}

.games .game .logo {
  width: 35px;
  height: 35px;
  margin-right: 20px;
}
</style>
