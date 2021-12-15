<template>
  <section id="ShopCart">
    <div class="container-m">
      <!-- top -->
      <div class="cart-top">
        <h1>Il mio ordine</h1>
        <button class="btn-success">Aggiungi altri piatti</button>
      </div>

      <!-- center -->
      <div class="cart-center">
        <div class="record-row" v-for="dish in cart.dishes" v-bind:key="dish.id">
          <div class="name-dish">{{dish.name}}</div>

          <div class="price-dish" >{{dish.price}} €</div>
          <div class="quantity-dish">
            <img
              class="arrow-less"
              src="../../../media/icons/small-arrow.svg"
              alt="Freccia quantità"
              @click="removeOne(dish.id)"
            />
            <div class="num-quantity">{{dish.quantity}}</div>
            <img 
              class="arrow-more"
              src="../../../media/icons/small-arrow.svg"
              alt="Freccia quantità"
              @click="addOne(dish.id)"
            />
          </div>
          <div class="delete-dish">
            <button class="btn-danger" @click="deleteDish(dish.id)">Elimina</button>
          </div>
        </div>
      </div>

      <!-- bottom -->
      <div class="cart-bottom">
        <h3>Prezzo totale €</h3>
        <button class="btn-alert">Procedi all'ordine</button>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "ShopCart",
  props: {
    // msg: String
  },
  data() {
    return {
      //

      // [GN] Carrello che verrà sincronizzato con il localStorage.cart
      cart: {
        total_price: 0,
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
      if (this.cart["dishes"].length <= 0) this.cart["user_id"] = null;
      localStorage.cart = JSON.stringify(this.cart);
    },
    deleteDish(id) {
      this.cart["dishes"] = this.cart["dishes"].filter(
        (dish) => dish["dish_id"] != id
      );
      this.synLocalStorage();
    },
    removeOne(id) {
      this.cart["dishes"].forEach((dish) => {
        if (dish["dish_id"] == id) dish["quantity"]--;
      });
      this.cart["dishes"] = this.cart["dishes"].filter(
        (dish) => dish["quantity"] > 0
      );
      this.synLocalStorage();
    },
    addOne(id) {
      alert("funziono!");

      this.cart["dishes"].forEach((dish) => {
        if (dish["dish_id"] == id) dish["quantity"]++;
      });
      this.synLocalStorage();
      alert("fine!");

    },
  },
  mounted() {
    this.synCart();
  },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";
#ShopCart{
    padding-top: $top-heigth;
    min-height: 800px;
    
    .cart-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    button {
        color: #fff;
        cursor: pointer;
    }
    .cart-top {
        padding: 2.5rem 0;
        
        h1 {
        @include f-section-title;
        color: #FFFAE9;
        }
    }
    .cart-center {
        border-top: 3px solid $c-03;
        color:#FFFAE9;
        
        .record-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            @include f-corpo-white;

            .name-dish, .price-dish, 
            .quantity-dish {
                padding: 0 15px;
            }
            .name-dish{
                width: 60%;
            }
            
            .quantity-dish {
                display: flex;
                align-items: center;
                
                [class^="arrow-"]{
                    height: 50px;
                }
                .arrow-more {
                    transform: rotate(180deg);
                }
                .num-quantity {
                    margin: 0 15px;
                }
            }
            .delete-dish {
                align-self:flex-end;
                margin-left: 15px;
            }
        }
    }
        .cart-bottom {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 10.5rem;
            border-top: 3px solid $c-03;
            padding-top: 1rem;
            

            h3 {
            @include f-corpo-white;
            margin-right: 4rem;
            font-weight: 800;

            }
            .btn-alert {
                color: $c-05;
            }
        }

}
</style>