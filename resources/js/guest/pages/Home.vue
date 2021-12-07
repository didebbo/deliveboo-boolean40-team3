<template>
  <div>
    <!-- Link vue-routes -->
    <router-link to="/chi-siamo">
      <p>Chi Siamo</p>
    </router-link>
    <!-- Link back-office -->
    <a href="/merchant">Merchant</a>
  </div>
</template>

<script>
import Posts from "../components/Posts";

export default {
  name: "Home",
  components: {
    Posts,
  },
};
</script>
