<template lang="pug">
  .download-card-container
    a(:href="url" target="_blank")
      .download-card(:style="style")
        .download-icon-wrapper
          download-icon
        .download-text Download {{ this.name }}

</template>

<script>
    import DownloadIcon from "./DownloadIcon";

    export default {
        name: "download-card",
        components: {DownloadIcon},
        props: {
            name: {type: String, required: true},
            image: {type: String},
            url: {type: String}
        },
        computed: {
            style() {
                return `
                  background: url(${this.image}) center;
                  background-size: contain;
                  background-repeat: no-repeat;
                `;
            }
        }
    }
</script>

<style lang="scss" scoped>
  .download-card-container {
    background: rgba(92, 92, 92, 0.31);
    display: inline-block;
    margin: 10px;
  }

  .download-card {
    display: inline-block;
    position: relative;

    width: 400px;
    height: 400px;
    cursor: pointer;

    .download-icon-wrapper {
      opacity: 0;
      padding: 35%;

      background: rgba(0, 0, 0, 0.48);
      width: 100%;
      height: 100%;
      box-sizing: border-box;
      transition: .5s;

      &:hover {
        opacity: 1;
      }
    }


    .download-text {
      font-family: "Dubai-Light", sans-serif;
      background: linear-gradient(transparent, rgba(0, 0, 0, 0.84));
      width: 100%;
      padding: 10px;
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
    }
  }
</style>
