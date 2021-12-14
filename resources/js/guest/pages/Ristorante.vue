<template>
  <section v-if="ristorante" id="Ristorante">
    <section class="top-page">
      <div class="left-side">
        <h2>{{ ristorante.name }}</h2>
        <p class="rst-description">{{ ristorante.adv }}</p>
      </div>
      <div class="right-side">
        <template v-if="ristorante.url_picture">
          <img :src="'/storage/' + ristorante.url_picture" alt="" />
        </template>
        <template v-else>
          <img
            :src="require('../../../media/images/segnaposto-rest.jpeg')"
            alt=""
          />
        </template>
      </div>
    </section>

    <section class="bottom-page container-l">
      <h3 class="title-foods">Cibi e menù</h3>
      <div class="dishes">
        <ObjDish
          v-for="dish in ristorante.dishes"
          :key="dish.id"
          :foodName="dish.name"
          :price="dish.price"
          :img="dish.url_picture"
          @addToCart="addToCart(dish.id)"
        />
      </div>

      <!-- <h3 class="title-drinks">Cibi e menù</h3>
			<div class="drinks">
				<ObjDish/>
				<ObjDish/>
				<ObjDish/>
			</div> -->
    </section>
  </section>
</template>

<script>
import ObjDish from "../components/small/ObjDish.vue";

export default {
  name: "Ristorante",
  components: {
    ObjDish,
  },
  props: ["id"],
  data() {
    return {
      ristorante: null,

      // [GN] Carrello che verrà sincronizzato con il localStorage.cart
      cart: {},
    };
  },
  methods: {
    synCart() {
      if (localStorage.cart) {
        this.cart = JSON.parse(localStorage.cart);
      }
    },
    addToCart(id) {
      if (!this.cart["user_id"]) {
        this.cart["user_id"] = this.ristorante.id;
        this.cart["dishes"] = [];
      } else if (this.cart["user_id"] != this.ristorante.id) {
        console.log("Non puoi selezionare un piatto da un ristorante diverso");
        return -1;
      }
      if (!this.isDishInCart(id)) {
        this.cart["dishes"].push({
          dish_id: id,
          quantity: 1,
        });
        console.log("added new dish");
      } else {
        this.addDishQuantity(id);
      }
      localStorage.cart = JSON.stringify(this.cart);
    },
    isDishInCart(id) {
      let isDishInCart = false;
      console.log("isDishInCart");
      this.cart["dishes"].forEach((dish) => {
        console.log(dish, id);
        if (dish["dish_id"] == id) {
          console.log("dish esistente");
          isDishInCart = true;
        }
      });
      return isDishInCart;
    },
    addDishQuantity(id) {
      console.log("addDishQuantity");
      this.cart["dishes"].forEach((dish) => {
        console.log(dish, id);
        if (dish["dish_id"] == id) {
          dish["quantity"] += 1;
          console.log("quantity + 1");
          return;
        }
      });
    },
  },
  mounted() {
    this.synCart();
    axios.get(`/api/restaurants/${this.id}`).then((response) => {
      this.ristorante = response.data.data;
      console.log(this.ristorante);
    });
  },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";

#Ristorante {
  padding-top: $top-heigth;

  .top-page {
    display: flex;
    margin-bottom: 30px;
    .left-side {
      width: 65%;
      padding-right: 20px;
      text-align: right;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;

      h2 {
        @include f-hero-title;
      }
      .rst-description {
        font-size: 1.5625rem;
        color: $c-04;
        padding: 20px 0;
      }
    }
    .right-side {
      width: 35%;
      border-bottom: 5px solid $c-03;
      border-left: 5px solid $c-03;
      border-bottom-left-radius: 30px;
      height: 400px;
      overflow: hidden;
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }
  }
  .bottom-page {
    margin-top: 100px;

    .drinks,
    .dishes {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .title-foods {
      color: $c-02;
      margin-top: 50px;
      font-size: 25px;
      border-bottom: 4px solid $c-02;
      padding-bottom: 10px;
      width: 250px;
    }
    .title-drinks {
      color: $c-04;
      margin-top: 50px;
      font-size: 25px;
      border-bottom: 4px solid $c-02;
      padding-bottom: 10px;
      width: 250px;
    }
  }
}
</style>