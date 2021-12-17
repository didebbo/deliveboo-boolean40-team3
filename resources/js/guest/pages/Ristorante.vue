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
          @addToCart="addToCart(dish)"
        />
      </div>

      <div v-if="confirmPopup[0]" class="popup-confirm">
        <p>Non puoi ordinare piatti da ristoranti differenti</p>
        <h3>Vuoi svuotare il tuo carrello?</h3>
        <div>
          <button class="btn-success" @click="refreshCart(confirmPopup[1])">Sì</button>
          <button class="btn-warning" @click="confirmPopup = [false]">No</button>
        </div>
      </div>
      <div v-if="popup" class="popup">
        <h3>Il carrello è stato svuotato</h3>
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

      confirmPopup: [false],
      popup: false,
      // [GN] Carrello che verrà sincronizzato con il localStorage.cart
      cart: {
        dishes: [],
      },
    };
  },
  methods: {
    synCart() {
      if (localStorage.cart) {
        this.cart = JSON.parse(localStorage.cart);
      }
    },
    synLocalStorage() {
      this.cart["total_price"] = 0;
      this.cart["dishes"].forEach((dish) => {
        this.cart["total_price"] += dish["price"] * dish["quantity"];
      });
      localStorage.cart = JSON.stringify(this.cart);
    },
    refreshCart(dish) {
      this.confirmPopup = false;
      this.popup = true;
      if (localStorage.cart) localStorage.removeItem("cart");
      this.cart = { dishes: [] };

      setTimeout(() => {
        this.popup = false;
      }, 1500);

        this.addToCart(dish);
      

      return 1;
    },
    addToCart(dish) {
      if (!this.cart["user_id"]) {
        this.cart["user_id"] = this.ristorante.id;
      } else if (this.cart["user_id"] != this.ristorante.id) {
        this.confirmPopup = [true, dish];
        return -1;
      }
      if (!this.isDishInCart(dish.id)) {
        this.cart["dishes"].push({
          name: dish.name,
          dish_id: dish.id,
          quantity: 1,
          price: dish.price,
        });
        console.log("added new dish");
      } else {
        this.addDishQuantity(dish.id);
      }
      this.synLocalStorage();
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
          dish["quantity"]++;
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

[class^="popup"]{
  padding: 20px;
  background-color: white;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 30px;
  @include flex-center;
  flex-direction: column;
  text-align: center;
  border: 5px solid $c-02;

  h3{
    font-size: 2.5rem;
    margin: 20px 0;
  }
  p{
    font-size: 1.25rem;
  }
}
.popup-confirm{
  max-width: 600px;
  div{
    width: 100%;
    @include flex-center;
    .btn-warning{
      margin-left: 25px;
    }
  }
}

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
    h2 {
      @include f-hero-title;
    }
    .rst-description {
      font-size: 1.5625rem;
      color: $c-04;
      padding: 20px 0;
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
    .drinks,
    .dishes {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .title-foods {
      color: $c-02;
      margin: 50px 0 40px;
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