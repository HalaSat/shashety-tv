<template lang="pug">
  div

    router-view
    app-footer
</template>
<script>
    import Footer from "../components/Footer";

    export default {
        components: {'app-footer': Footer}
    };
</script>
