<template>
  <section id="ObjDish">
    <div :class="`dish-card ${type}`">
      <div class="circle-img">
        <template v-if="img">
          <img :src="'/storage/' + img" alt="" />
        </template>
        <template v-else>
          <img
            :src="require('../../../../media/images/segnaposto-food.webp')"
            alt=""
          />
        </template>
      </div>
      <p class="name-dish">{{ foodName }}</p>
      <p class="ingredients-dish">{{ ingredients }}</p>

      <div class="icon-cart" @click="startPopup()">
        <img src="../../../../media/icons/cart-white-ADD.svg" alt="" />
        <div id="popup-cart" :class="showPopup">Aggiunto al carrello!</div>
      </div>

      <div class="obj-price">
        <p class="price-dish">{{ price }} €</p>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "ObjDish",
  props: {
    foodName: String,
    ingredients: String,
    img: String,
    price: Number,
    type: String,
    ristorante: Object,
  },
  data() {
    return {
      showPopup: "",
      cart: {},
    };
  },
  methods: {
    synCart() {
      if (localStorage.cart) {
        this.cart = JSON.parse(localStorage.cart);
      }
    },
    startPopup() {
      if (this.cart["user_id"] == this.ristorante.id) {
        this.showPopup = "show";
        setTimeout(() => {
          this.showPopup = "";
        }, 1500);
      }
      this.$emit("addToCart");
    },
  },
  mounted() {
    this.synCart();
  },
};
</script>

<style scoped lang="scss">
@import "../../../../sass/_variables.scss";

@mixin f-title-card {
  @include sans-extrabold-i;
  font-size: 1.375rem;
  color: $c-05;
}

#ObjDish {
  background-color: $c-05;
  padding: 10px;

  .dish-card {
    background-color: #fffae9;
    border-radius: 30px;
    height: 155px;
    width: 580px;
    margin: 20px auto;
    padding: 20px;
    position: relative;
    box-shadow: $shadow-02;
    display: flex;
    flex-direction: column;
    justify-content: center;

    &.food {
      // filter: $shadow-02;
      .circle-img {
        border: 4px solid $c-02;
      }
      .icon-cart {
        background-color: $c-02;
      }
    }

    &.drinks {
      box-shadow: $shadow-04;
      .circle-img {
        border: 4px solid $c-04;
      }
      .icon-cart {
        background-color: $c-04;
      }
    }

    .circle-img {
      height: 134px;
      width: 134px;
      border-radius: 50%;
      overflow: hidden;
      position: absolute;
      left: -12px;
      top: -20px;
      border: 4px solid $c-02;
      background-color: $c-02;
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }

    .name-dish,
    .ingredients-dish {
      margin-left: 140px;
      font-size: 1.125rem;
    }
    .name-dish {
      @include f-title-card;
      font-size: 1.6875rem;
    }
    .icon-cart {
      width: 62px;
      height: 62px;
      border-radius: 50%;
      position: absolute;
      right: -35px;
      top: -20px;
      cursor: pointer;

      img {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        height: 50px;
        bottom: 5px;
      }

      // Inizio popup
      #popup-cart {
        opacity: 0;
        min-width: 250px;
        background-color: #fff;
        color: #000;
        text-align: center;
        border-radius: 30px;
        padding: 16px;
        position: absolute;
        z-index: 1;
        right: 50%;
        bottom: calc(100% + 5px);
        transform: translateX(26px);
        font-size: 17px;
        transition-timing-function: ease-out;
        transition: 0.5s;
      }

      #popup-cart.show {
        opacity: 1;
      }
    }

    // Fine popup
  }
  .obj-price {
    color: $c-05;
    width: 130px;
    height: 58px;
    border-radius: 30px;
    background-color: $c-03;
    position: absolute;
    right: -35px;
    bottom: -15px;
    display: flex;
    align-items: center;
    justify-content: center;
    .price-dish {
      @include f-title-card;
    }
  }
}
</style>