<template>
  <section id="ShopCart">
    Questo è il tuo carrello

    <p>
      <a
        style="color: red; display: inline-block; font-size: 50px; margin: 40px"
        href="/orders/create"
        >Completamento Ordine</a
      >
    </p>
  </section>
</template>

<script>
export default {
  name: "ShopCart",
  props: {
    // msg: String
  },
  data() {
    return {
      //
      /* Salvare l'ordine con questa struttura
      order: {
        user_id: 1,                 // Usare l'id del ristorante selezionato
        total_price: 20,            // Sommare il prezzo dei vari piatti 
        dishes: [
          {                         // Piatto 1
            dish_id: 1,             // ID piatto
            quantity: 2,            // Quantità del piatto
          },
          {
            dish_id: 2,
            quantity: 1,
          },
        ],
      }, */
    };
  },
  methods: {
    //
  },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";

#ShopCart {
  padding-top: $top-heigth;
  min-height: 100px;
}
</style>