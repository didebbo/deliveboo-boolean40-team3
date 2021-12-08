<template>
  <div id="Home">

    <!-- Link vue-routes -->
    <router-link :to="{ name: 'search' }">
      <p>Chi Siamo</p>
    </router-link>

    <!-- Link back-office -->
    <a href="/merchant">Merchant</a>

  </div>
</template>

<script>

export default {
  name: "Home",
  components: {
    //
  },
};
</script>
