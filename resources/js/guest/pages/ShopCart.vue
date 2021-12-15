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
                        
                    <div class="record-row">
                        <div class="name-dish">nome piatto</div>

                            <div class="price-dish">198€</div>
                            <div class="quantity-dish">
                                <img class="arrow-less" src="../../../media/icons/small-arrow.svg" alt="Freccia quantità">
                                <div class="num-quantity">18</div>
                                <img class="arrow-more" src="../../../media/icons/small-arrow.svg" alt="Freccia quantità">
                            </div>
                            <div class="delete-dish">
                                <button class="btn-danger">Elimina</button>
                            </div>
                        
                    </div>

                </div>

                <!-- bottom -->
                <div class="cart-bottom">
                    <h3>Prezzo totale  €</h3>
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
        /* Salvare l'ordine con questa struttura
        order: {
        user_id: 1,                 // Usare l'id del ristorante selezionato
        total_price: 20,            // Sommare il prezzo dei vari piatti 
        dishes: [
            {                         // Piatto 1
            dish_id: 1,             // ID piatto
            quantity: 2,            // Quantità del piatto
            },
            {
            dish_id: 2,
            quantity: 1,
            },
        ],
        }, */
    };
    },
    methods: {
    //
    },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";

#ShopCart{
    padding-top: $top-heigth;
    min-height: 100px;
    
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
                    margin: 0 3px;
                }
            }
            .delete-dish {
                align-self:flex-end;
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