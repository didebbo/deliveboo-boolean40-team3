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
        .querySelector("meta[name='csrfToken']")
        .getAttribute("content"),
    };
  },
  methods: {
    onSuccess(payload) {
      let nonce = payload.nonce;
      console.log(nonce);
      // Do something great with the nonce...
    },
    onError(error) {
      let message = error.message;
      console.log(message);
      // Whoops, an error has occured while trying to get the nonce
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