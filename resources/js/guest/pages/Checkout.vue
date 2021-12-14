<template>
  <section id="Checkout">
    <form>
      <label for="customer_firstname">
        customer_firstname:
        <input
          type="text"
          name="customer_firstname"
          id="customer_firstname"
          v-model="order.customer_firstname"
        />
        <small v-if="errors['order.customer_firstname']">
          {{ errors["order.customer_firstname"][0] }}
        </small>
      </label>
      <label for="customer_lastname">
        customer_lastname:
        <input
          type="text"
          name="customer_lastname"
          id="customer_lastname"
          v-model="order.customer_lastname"
        />
        <small v-if="errors['order.customer_lastname']">
          {{ errors["order.customer_lastname"][0] }}
        </small>
      </label>
      <label for="customer_email">
        customer_email:
        <input
          type="email"
          name="customer_email"
          id="customer_email"
          v-model="order.customer_email"
        />
        <small v-if="errors['order.customer_email']">
          {{ errors["order.customer_email"][0] }}
        </small>
      </label>
      <label for="customer_phone">
        customer_phone:
        <input
          type="tel"
          name="customer_phone"
          id="customer_phone"
          v-model="order.customer_phone"
        />
        <small v-if="errors['order.customer_phone']">
          {{ errors["order.customer_phone"][0] }}
        </small>
      </label>
      <label for="customer_address">
        customer_address:
        <input
          type="text"
          name="customer_address"
          id="customer_address"
          v-model="order.customer_address"
        />
        <small v-if="errors['order.customer_address']">
          {{ errors["order.customer_address"][0] }}
        </small>
      </label>
      <label for="notes">
        notes:
        <textarea name="notes" id="notes" v-model="order.notes"></textarea>
        <small v-if="errors['order.notes']">
          {{ errors["order.notes"][0] }}
        </small>
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
      order: {
        customer_firstname: null,
        customer_lastname: null,
        customer_email: null,
        customer_phone: null,
        customer_address: null,
        notes: null,
        user_id: 1,
        total_price: 20,
        status: 0,
        dishes: [
          {
            dish_id: 1,
            quantity: 2,
          },
          {
            dish_id: 2,
            quantity: 1,
          },
        ],
      },
      errors: {},
    };
  },
  methods: {
    onSuccess(payload) {
      let params = {
        nonce: payload.nonce,
        order: this.order,
        dishes: this.dishes,
      };
      this.errors = {};
      axios
        .post("/checkout", params, {
          headers: {
            "X-CSRF-TOKEN": this.csrfToken,
          },
        })
        .then((response) => {
          console.log(response.data);
          this.$router.push("/");
          /* 
            Se data.success === true 
            portami alla pagina di Success
          */
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          console.log(this.errors);
          /* 
            Se la validazione non va a buon fine 
            salvo gli errori di err.response.data
            mostrando per ogni campo l'errore generato. 
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