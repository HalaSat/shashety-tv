<template lang="pug">
  .wrapper(v-if="schedule")
    schedule-game(:key="league.id" v-for="league in schedule" :league="league")
  loading-indicator(v-else)
</template>

<script>
import ScheduleGame from "../components/ScheduleGame";
import { getGames } from "../api/schedule";
import LoadingIndicator from "../components/LoadingIndicator";

export default {
  name: "schedule",
  data() {
    return {
      schedule: null
    };
  },
  components: { ScheduleGame, LoadingIndicator },
  async created() {
    await this.getSchedule();
  },
  methods: {
    async getSchedule() {
      const result = await getGames();

      this.schedule = result["competitions"].map(competition => {
        const games = result.games.filter(
          ({ competitionId }) => competitionId === competition.id
        );
        const country = result.countries.find(
          country => country.id === competition.countryId
        );
        return { competition, games, country };
      });
      console.log(this.schedule);
    }
  }
};
</script>

<style scoped>
</style>
