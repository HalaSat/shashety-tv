<template lang="pug">
  .circle.outer.rotating
    .circle.middle
      .circle.inner.reverse-rotating
        .play
</template>
<script>
  export default {
    name: "play-button"
  }
</script>
<style lang="scss" scoped>
  $primary-color: #d60000;


  .circle {
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
  }

  .outer {
    width: 10vw;
    height: 10vw;
    border: 2px dashed $primary-color;
  }

  .outer:hover {
    transform: scale(1.1);
  }

  .middle {
    width: 8.5vw;
    height: 8.5vw;

    border: 1px dashed $primary-color;
  }

  .inner {
    background: $primary-color;
    width: 7vw;
    height: 7vw;
    transition: 0.5s;
  }

  .play {
    width: 0;
    height: 0;
    border-top: 1.3vw solid transparent;
    border-bottom: 1.3vw solid transparent;
    border-left: 1.8vw solid white;
    margin-right: -5px;
  }

  // animation
  @keyframes rotating {
    from {
      transform: rotate(0deg);
    }
    to {
      transform: rotate(360deg);
    }
  }

  @keyframes reverse-rotating {
    from {
      transform: rotate(360deg);
    }
    to {
      transform: rotate(0deg);
    }
  }

  .rotating {
    animation: rotating 8s linear infinite;
  }

  .rotating:hover {
    animation: none;
  }

  .rotating:hover .reverse-rotating {
    animation: none;
  }

  .reverse-rotating {
    animation: reverse-rotating 8s linear infinite;
  }

  @media screen and (max-width: 700px) {
    .outer {
      width: 100px;
      height: 100px;
    }

    .outer:hover {
      transform: none;
    }

    .middle {
      width: 85px;
      height: 85px;
    }

    .inner {
      width: 70px;
      height: 70px;
    }

    .play {
      width: 0;
      height: 0;
      border-top: 13px solid transparent;
      border-bottom: 13px solid transparent;
      border-left: 18px solid white;
      margin-right: -5px;
    }
  }
</style>
