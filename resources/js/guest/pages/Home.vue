<template>
  <div id="Home">

    <Hero url="fast-food-2.jpg" headline="Il vero Fast che stavi aspettando!"/>

    <pop-categories/>

    <RandomRestaurant/>

    <WhyUs/>

    <div id="call-to-restaurant">
        <div class="registrazione">
          <h2><span>Sei un ristorante?</span></h2>
          <div class="description">
            <p>
              Premi sul pulsante " Registrati come Ristoratore " per iniziare la tua collaborazione con noi!
            </p>
            <p>
              Potrai inserire il tuo menù e ricevere subito i tuoi primi ordini
            </p>
          </div>
          <a href="/register" class="btn-danger">Registrati come Ristoratore</a>
        </div>
      </div>

  </div>
</template>

<script>
import Hero from '../components/Hero.vue'
import RandomRestaurant from '../components/RandomRestaurant.vue'
import WhyUs from '../components/WhyUs.vue'
import PopCategories from '../components/PopCategories.vue'

export default {
  name: "Home",
  components: {
    Hero,
    RandomRestaurant,
    WhyUs,
    PopCategories
  },
};
</script>

<style scoped, lang="scss">
@import '../../../sass/_variables.scss';

#call-to-restaurant {
    margin-bottom: 5rem;

    .registrazione {
    display: flex;
    flex-direction: column;
    align-items: center;

    .description{
      text-align: center;
        margin-top: .625rem;
        margin-bottom: 1.5625rem;
    }

    h2 {
      @include f-section-title;
      color: $c-01;
    }

    p {
      color: white;
    }

    a{
      text-decoration: none;
    }
  }
}

</style>
