<template>
    <section id="ShopCart">
        <div class="container-m">
        <!-- top -->
        <div class="cart-top">
            <h1>Il mio ordine</h1>
            <button
            v-if="cart.user_id"
            class="btn-success"
            @click="$router.push('/ristorante/' + cart.user_id)"
            >
            Aggiungi altri piatti
            </button>
        </div>

        <!-- center -->
        <div class="cart-center">
            <div
            class="record-row"
            v-for="dish in cart.dishes"
            v-bind:key="dish.dish_id"
            >
            <div class="name-dish">{{ dish.name }}</div>
            <div class="price-dish">{{ dish.price }} €</div>
            <div class="quantity-dish">
                <img
                class="less-quantity"
                src="../../../media/icons/minus.svg"
                alt="Freccia quantità"
                @click="removeOne(dish.dish_id)"
                />
                <div class="num-quantity">{{ dish.quantity }}</div>
                <img
                class="more-quantity"
                src="../../../media/icons/plus.svg"
                alt="Freccia quantità"
                @click="addOne(dish.dish_id)"
                />
            </div>
            <div class="delete-dish">
                <button class="btn-danger" @click="deleteDish(dish.dish_id)">
                Elimina
                </button>
            </div>
            </div>
        </div>

        <!-- bottom -->
        <div class="cart-bottom">
            <h3>Totale {{ cart.total_price }} €</h3>
            <button class="btn-alert" @click="$router.push('/checkout')">
            Procedi all'ordine
            </button>
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
            if(this.cart["total_price"] > 0){
                this.cart["total_price"] = this.cart["total_price"].toFixed(2);
            }
        }
        },
        synLocalStorage() {
        this.cart["total_price"] = 0;
        this.cart["dishes"].forEach((dish) => {
            this.cart["total_price"] += dish["price"] * dish["quantity"];
        });
        this.cart["total_price"] = this.cart["total_price"].toFixed(2);
        
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
        this.cart["dishes"].forEach((dish) => {
            if (dish["dish_id"] == id) dish["quantity"]++;
        });
        this.synLocalStorage();
        },
    },
    mounted() {
        this.synCart();
    },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";
    #ShopCart {
    padding-top: $top-heigth;

    .cart-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2.5rem 0;
        h1 {
        @include f-section-title;
        color: #fffae9;
        }
        button {
        color: #fff;
        cursor: pointer;
        }
    }

    .cart-center {
        border-top: 3px solid $c-03;
        color: #fffae9;

        .record-row {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding: 15px 0;
        @include f-corpo-white;
        flex-wrap: wrap;
        position: relative;

            .name-dish,
            .price-dish,
            .quantity-dish {
                padding: 0 15px;
            }
            .name-dish {
                flex-grow: 1;
                // max-width: 530px;
            }

            .quantity-dish {
                display: flex;
                align-items: center;

                .less-quantity,
                .more-quantity {
                width: 26px;
                cursor: pointer;
                margin: 0 15px;
                }
                .less-quantity {
                padding: 20px 0;
                }
            }
            .delete-dish {
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
@media screen and (max-width: 990px){
    .name-dish{
        min-width: 100%;
    }
    [class^="btn-danger"]{
        padding: 10px;
        font-size: 1.125rem;
        height: 40px;
        min-width: 100px;
    }
    .record-row::after{
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        display: block;
        height: 1px;
        width: 100%;
        background-color: lightslategray;
    }
}
@media screen and (max-width: 500px){
    [class^="btn-danger"]{
        padding: 5px;
        font-size: .9375rem;
        height: 30px;
        min-width: 95vw;
        margin-top: 15px;
    }
}
</style>