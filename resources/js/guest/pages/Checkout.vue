<template>
  <section id="Checkout">
    <div class="container-xs">

    <form>
      <h2 class="title-payment">Inserisci i dati di pagamento</h2>
      <label for="customer_firstname">
        <div class="user-details">Nome</div>
        <input
          type="text"
          name="customer_firstname"
          id="customer_firstname"
          v-model="order.customer_firstname"
        />
        <small v-if="errors['order.customer_firstname']">
            Errore, il nome è un dato obbligatorio
        </small>
      </label>
      <label for="customer_lastname">
        <div class="user-details">Cognome</div>
        <input
          type="text"
          name="customer_lastname"
          id="customer_lastname"
          v-model="order.customer_lastname"
        />
        <small v-if="errors['order.customer_lastname']">
          Errore, il cognome è un dato obbligatorio
        </small>
      </label>
      <label for="customer_email">
        <div class="user-details">E-mail</div>
        <input
          type="email"
          name="customer_email"
          id="customer_email"
          v-model="order.customer_email"
        />
        <small v-if="errors['order.customer_email']">
          Errore, e-mail non valida
        </small>
      </label>
      <label for="customer_phone">
        <div class="user-details">Telefono</div>
        <input
          type="tel"
          name="customer_phone"
          id="customer_phone"
          v-model="order.customer_phone"
        />
        <small v-if="errors['order.customer_phone']">
          Errore, il numero di telefono è un dato obbligatorio
        </small>
      </label>
      <label for="customer_address">
        <div class="user-details">Indirizzo</div>
        <input
          type="text"
          name="customer_address"
          id="customer_address"
          v-model="order.customer_address"
        />
        <small v-if="errors['order.customer_address']">
          Errore, l'indirizzo è un dato obbligatorio
        </small>
      </label>
      <label for="notes">
        <div class="user-details">Note:</div>
        <textarea name="notes" id="notes" v-model="order.notes"></textarea>
        <small v-if="errors['order.notes']">
          Errore, dato non valido
        </small>
      </label>
    </form>
    <v-braintree 
      :authorization="clientToken"
      @success="onSuccess"
    >
      <template v-slot:button="slotProps">
      <v-btn class="btn-warning" @click="slotProps.submit">Paga!</v-btn>
      </template>
    </v-braintree>

    </div>

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
        user_id: null,
        total_price: null,
      },
      dishes: [],
      errors: {},
    };
  },
  methods: {
    synCart() {
      if (localStorage.cart) {
        const cart = JSON.parse(localStorage.cart);
        this.order["user_id"] = cart["user_id"];
        this.order["total_price"] = cart["total_price"];
        this.dishes = cart["dishes"];
      }
    },
    synLocalStorage() {
      if (localStorage.cart) localStorage.removeItem("cart");
      this.order.user_id = null;
    },
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
          if (response.data.success) {
            this.synLocalStorage();
            alert("Transazione effettuata con successo");
            this.$router.push("/"); // Andare alla pagine success.
          } else if (!response.data.success) {
            alert(
              "Impossibile effettuare la transazione, controlla che il carrello sia pieno"
            );
            this.$router.push("/il-tuo-carrello");
          }
          /* 
            Se data.success === true 
            portami alla pagina di Success
          */
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          console.log(this.errors);
        });
    },
  },
  mounted() {
    this.synCart();
    if (this.order.user_id == null) this.$router.push("/");
  },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";
#Checkout {
  padding-top: $top-heigth;

  .container-xs {
    border: 4px solid $c-04;
    border-radius: 30px;
    margin-top: 50px;
    padding: 40px;
    background-color: #fff;
    color: black;

  
  form {
    
    display: flex;
    flex-direction: column;

    .title-payment {
      text-align: center;
      margin-bottom: 30px;
      color: $c-05;
    }

    input,
    textarea {
      margin: 0.5em 0 0;
      width: 100%;
      padding: 5px;
    }
    textarea{
      margin-bottom: 2em;
    }
    small {
      color: red;
      font-size: 1rem;
    }
    .user-details {
      margin-top: 1em;
    }
  }
  .btn-warning {
    color: #1a1f71;
    margin-top: 30px;
  }
  }
}
</style>