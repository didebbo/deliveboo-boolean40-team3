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
    <!-- Delete-Cart PopUp -->
    <div v-if="popup.visible" class="popup-confirm">
      <span>
        <h3>{{ popup.message }}</h3>
        <p v-if="popup.submessage">
          {{ popup.submessage }}
        </p>
      </span>
      <div>
        <button class="btn-warning" @click="redirect('/')">
          {{ popup.btnText }}
        </button>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Checkout",
  data() {
    return {
      popup: {
        visible: false,
        message: null,
        submessage: null,
        btnText: null,
        error: false,
      },
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
    redirect(path) {
      this.popup.visible = false;
      if (!this.popup.error) this.$router.push(path);
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
            this.popup.message = "Transazione effettuata con successo";
            this.popup.submessage = null;
            this.popup.btnText = "Torna alla Home";
            this.popup.error = false;
            this.popup.visible = true;
          } else if (!response.data.success) {
            this.popup.message = "Transazione rifiutata, riprova.";
            this.popup.submessage =
              "Se il problema persiste contatta l'assistenza";
            this.popup.btnText = "Conferma";
            this.popup.error = true;
            this.popup.visible = true;
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
  form {
    color: #fff;
    display: flex;
    flex-direction: column;
    input,
    textarea {
      margin: 1em;
    }
  }
  [class^="popup"] {
    padding: 20px;
    background-color: #fefae9;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 30px;
    @include flex-center;
    flex-direction: column;
    text-align: center;
    border: 5px solid $c-02;
    z-index: 2;
    span {
      margin: 50px 0;
      h3 {
        font-size: 1.5rem;
      }
      p {
        font-size: 1.25rem;
      }
    }
  }
  .popup-confirm {
    max-width: 600px;
    div {
      width: 100%;
      @include flex-center;
      .btn-warning {
        margin-left: 25px;
      }
    }
  }
}
</style>