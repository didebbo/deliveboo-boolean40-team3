<template>
  <header>
    <div class="container-l" id="desktop-nav">
      <div class="logo">
        <router-link :to="{ name: 'home' }">
          <img src="../../../media/images/logo-int-4x.png" alt="" />
        </router-link>
      </div>
      <nav>
        <ul>
          <li>
            <router-link :to="{ name: 'home' }">
              <p>Home</p>
            </router-link>
          </li>

          <!-- <li>
            <router-link :to="{ name: 'about' }">
              <p>Chi siamo</p>
            </router-link>
          </li> -->

          <li>
            <a href="/login">
              <p>Accedi</p>
            </a>
          </li>

          <li class="search">
            <router-link :to="{ name: 'search' }">
              <img src="../../../media/icons/search.svg" alt="" />
            </router-link>
          </li>

          <li class="shopping-cart" alt="il tuo carrello">
            <router-link :to="{ name: 'shop-cart' }">
              <p>{{ cart.total_dishes }}</p>
              <img src="../../../media/icons/cart-white.svg" alt="" />
            </router-link>
          </li>
        </ul>
      </nav>
    </div>


    <!-- Smartphone NavBar -->
    <div class="container-l" id="smartphone-nav">
      <div class="logo">
        <router-link :to="{ name: 'home' }">
          <img src="../../../media/images/logo-int-4x.png" alt="" />
        </router-link>
      </div>
      <nav>
        <div id="hamburger-icon" class="hamburger-icon" @click="openSmart()">
          <ul>
            <li>
              <router-link :to="{ name: 'home' }">
                <p>Home</p>
              </router-link>
            </li>

            <li alt="il tuo carrello">
              <router-link :to="{ name: 'shop-cart' }">
                <p>Carrello: {{ cart.total_dishes }}</p>
              </router-link>
            </li>

            <li class="search">
              <router-link :to="{ name: 'search' }">
                <img src="../../../media/icons/search-white.svg" alt="" />
              </router-link>
            </li>

            <!-- <li>
              <a href="/login">
                <p>Accedi come ristoratore</p>
              </a>
            </li> -->
          </ul>
        </div>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      cart: {
        dishes: [],
        total_dishes: 0,
      },
    };
  },
  methods: {
    openSmart(){
      let hamObj = document.getElementById('hamburger-icon').classList;

      if(hamObj.contains("open")){
        hamObj.remove('open')
      } else {
        hamObj.add('open')
      }
    },
    synCart() {
      if (localStorage.cart) {
        this.cart = JSON.parse(localStorage.cart);
        this.cart["total_dishes"] = 0;
      } else if (this.cart.total_dishes > 0 || this.cart.dishes.length > 0)
        this.cart = {
          dishes: [],
          total_dishes: 0,
        };
    },
    loadQuantity() {
      this.cart.dishes.forEach((dish) => {
        this.cart.total_dishes += dish.quantity;
      });
    },
  },
  mounted() {
    setInterval(() => {
      this.synCart();
      this.loadQuantity();
    }, 100);
  },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

header {
  padding-top: 10px;
  width: 100%;
  position: fixed;
  z-index: 10;
  background-color: white;
  padding-bottom: 0.9375rem;
  border-bottom-left-radius: 30px;
  border-bottom-right-radius: 30px;
  top: 0;
  left: 0;
  .container-l {
    height: 62px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .logo {
    background-color: white;
    height: 50px;
    border-radius: 35px;
    padding: 12px;

    img {
      height: 100%;
    }
  }

  nav {
    margin-right: 50px;
    padding: 15px;
    a {
      color: $c-05;
      text-decoration: none;
    }
    ul {
      display: flex;
      // align-items: center;
      list-style: none;
      @include sans-semibold;
      position: relative;
      padding-right: 30px;
    }
    li {
      color: $c-05;
      text-transform: uppercase;
      margin-left: 25px;

      &.shopping-cart {
        a {
          color: white;
        height: 62px;
        width: 62px;
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        left: 100%;

        background-color: $c-01;
        }

        img,
        p {
          position: absolute;
          left: 50%;
          transform: translateX(-50%);
        }

        img {
          height: 25px;
          bottom: 5px;
        }
        p {
          top: 0px;
          left: calc(50% + 2px);
          font-size: 25px;
        }
      }

      &.search {
        img {
          height: 20px;
        }
      }
    }
  }
}

#smartphone-nav{
  display: none;

  nav{
    margin-right: 0;
  }

  .hamburger-icon{
    height: 55px;
    width: 55px;
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: $c-01;
    border-radius: 50%;
    transition: 0.1s;
    // border: 5px solid white;

    &::before, &::after{
      content: '';
      position: absolute;
      // top: 50%;
      // right: 50%;
      right: 11px;
      height: 5px;
      width: 32px;
      background-color: white;
      transition: .3s;
    }
    &::before{
      // transform: translate(50%, calc(-50% - 6px));
      top: 20px;
    }
    &::after{
      // transform: translate(50%, calc(-50% + 6px));
      top: 32px;
    }

    ul{
      display: none;
    }
  }

}
#smartphone-nav .hamburger-icon.open{
  position: absolute;
  top: 0;
  right: 0;
  width: 100%;
  height: 110vh;
  border-radius: 0;
  overflow: hidden;

  ul{
    display: flex;
    flex-direction: column;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 0;

    li{
      color: white;
      @include sans-semibold;
      font-size: 1.375rem;
      text-align: center;
      padding: 20px 0;

      a{
        color: white;
      }
    }
  }

  &::before, &::after{
      content: '';
      position: absolute;
      top: 50px;
      height: 5px;
      width: 32px;
      background-color: white;
  }
  &::before{
    transform: rotate(45deg);
  }
  &::after{
    transform: rotate(-45deg);
  }
}

@media screen and (max-width: 475px){
  #smartphone-nav{
    display: flex;
  }
  #desktop-nav{
    display: none;
  }
}

</style>