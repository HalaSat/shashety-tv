<template lang="pug">
  nav.nav-bar.gradient
    a.logo
      img(src="images/logo.png")
    .expanded
    .left
      router-link.button.downloads(to="/home/downloads") Downloads

      //a(href="#") English
      //.divider
      //a(href="#") العربية
</template>
<script>
    export default {
        name: "navbar",
    };
</script>
<style lang="scss" scoped>
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
    }

    .downloads {
      margin-right: 50px;
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

  /*@media screen and(max-width: 700px) {*/
  /*  .downloads {*/
  /*    display: none;*/
  /*  }*/
  /*}*/
</style>
