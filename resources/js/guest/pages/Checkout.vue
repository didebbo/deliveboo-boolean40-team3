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
        amount: 20,
      };
      axios
        .post("/checkout", params, {
          headers: {
            "X-CSRF-TOKEN": this.csrfToken,
          },
        })
        .then(function (response) {
          console.log(response);
          /* 
            Se data.success === true 
            portami alla pagina di Success
            effettua una richiesta post al server per salvare i dati dell'ordine
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