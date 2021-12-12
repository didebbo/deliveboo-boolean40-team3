<template>
  <section id="Checkout">
    <form>
      <label for="customer_firstname">
        customer_firstname:
        <input
          type="text"
          name="customer_firstname"
          id="customer_firstname"
          v-model="inputs.customer_firstname"
        />
        <small> Errore: customer_firstname non valido! </small>
      </label>
      <label for="customer_lastname">
        customer_lastname:
        <input
          type="text"
          name="customer_lastname"
          id="customer_lastname"
          v-model="inputs.customer_lastname"
        />
        <small> Errore: customer_lastname non valido! </small>
      </label>
      <label for="customer_email">
        customer_email:
        <input
          type="email"
          name="customer_email"
          id="customer_email"
          v-model="inputs.customer_email"
        />
        <small> Errore: customer_email non valido! </small>
      </label>
      <label for="customer_phone">
        customer_phone:
        <input
          type="tel"
          name="customer_phone"
          id="customer_phone"
          v-model="inputs.customer_phone"
        />
        <small> Errore: customer_phone non valido! </small>
      </label>
      <label for="customer_address">
        customer_address:
        <input
          type="text"
          name="customer_address"
          id="customer_address"
          v-model="inputs.customer_address"
        />
        <small> Errore: customer_address non valido! </small>
      </label>
      <label for="notes">
        notes:
        <textarea name="notes" id="notes" v-model="inputs.notes"></textarea>
        <small> Errore: notes non valido! </small>
      </label>
    </form>
    <v-braintree
      :authorization="clientToken"
      @success="onSuccess"
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
      inputs: {
        customer_firstname: "",
        customer_lastname: "",
        customer_email: "",
        customer_phone: "",
        customer_address: "",
        notes: "",
      },
      errors: [],
    };
  },
  methods: {
    onSuccess(payload) {
      let params = {
        nonce: payload.nonce,
        user_id: 1,
        total_price: 20,
        status: 0,
        customer_firstname: this.customer_firstname,
        customer_lastname: this.customer_lastname,
        customer_email: this.customer_email,
        customer_phone: this.customer_phone,
        customer_address: this.customer_address,
        notes: this.notes,
      };
      console.log(params);
      // this.errors = [];
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
  },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";
#Checkout {
  padding-top: $top-heigth;
  form {
    color: #fff;
    display: flex;
    flex-direction: column;
    input,
    textarea {
      margin: 1em;
    }
  }
}
</style>