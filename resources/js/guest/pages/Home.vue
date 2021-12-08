<template>
  <div id="Home">

    <Hero url="fast-food-2.jpg" headline="Il vero Fast che stavi aspettando!"/>

    <!-- Components (categories) -->

    <RandomRestaurant/>

    <WhyUs/>

    <!-- <router-link :to="{ name: 'search' }">
      <p>Chi Siamo</p>
    </router-link>

    <a href="/merchant">Merchant</a> -->

  </div>
</template>

<script>
import Hero from '../components/Hero.vue'
import RandomRestaurant from '../components/RandomRestaurant.vue'
import WhyUs from '../components/WhyUs.vue'

export default {
  name: "Home",
  components: {
    Hero,
    RandomRestaurant,
    WhyUs
  },
};
</script>
