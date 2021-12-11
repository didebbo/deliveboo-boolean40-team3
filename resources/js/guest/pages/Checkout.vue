<template>
  <section id="Checkout">
    <v-braintree
      :authorization="clientToken"
      @success="onSuccess"
      @error="onError"
    ></v-braintree>
  </section>
</template>

<script>
export default {
  name: "Checkout",
  data() {
    return {
      clientToken: document
        .querySelector("meta[name='clientToken']")
        .getAttribute("content"),
      csrfToken: document
        .querySelector("meta[name='csrf-token']")
        .getAttribute("content"),
    };
  },
  methods: {
    onSuccess(payload) {
      let params = {
        nonce: payload.nonce,
        user_id: 1,
        total_price: 20,
        status: 0,
        customer_email: "deliveboo@gmail.com",
        customer_firstname: "Delive",
        customer_lastname: "Boo",
        customer_phone: "1234567890",
        customer_address: "Piazza DeliveBoo 12, 1234",
        notes: "Fate presto, sto morendo di fame!",
      };
      axios
        .post("/checkout", params, {
          headers: {
            "X-CSRF-TOKEN": this.csrfToken,
          },
        })
        .then(function (response) {
          console.log(response.data);
          /* 
            Se data.success === true 
            portami alla pagina di Success
          */
        })
        .catch(function (err) {
          console.log(err.response.data);
          /* 
            Se la validazione non va a buon fine 
            salvo gli errori di err.response.data
            refresho la pagine mostrando per ogni campo l'errore generato. 
          */
        });
    },
    onError(error) {
      let message = error.message;
      console.log(message);
    },
  },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";
#Checkout {
  padding-top: $top-heigth;
}
</style>