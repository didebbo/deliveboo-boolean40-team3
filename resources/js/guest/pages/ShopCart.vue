<template>
    <section id="ShopCart">

        <p>
            <a style="color: red; display:inline-block; font-size: 50px; margin: 40px;" href="/orders/create">Completamento Ordine</a>
        </p>


            <div class="container-m">
                <!-- top -->
                <div class="cart-top">
                    <h1>Il mio ordine</h1>
                    <button class="btn-success">Aggiungi altri piatti</button>
                </div>

                <!-- center -->
                <div class="cart-center">
                        
                    <ul>
                        <li class="name-dish">nome piatto</li>
                        <li class="price-dish">Prezzo</li>
                        <li class="quantity-dish">
                            <img src="../../../media/icons/small-arrow.svg" alt="Freccia quantità">
                            <span>quantità</span>
                            <img src="../../../media/icons/small-arrow.svg" alt="Freccia quantità">
                        </li>
                        <li>
                            <button class="btn-danger">Elimina</button>
                        </li>
                    </ul>
                    <ul>
                        <li class="name-dish">nome piattonome piattonome piattonome piattonome piattonome piattonome piattonome piattonome piattonome piattonome piattonome piattonome piatto</li>
                        <li class="price-dish">Prezzo</li>
                        <li class="quantity-dish">
                            <img src="../../../media/icons/small-arrow.svg" alt="Freccia quantità">
                            <span>quantità</span>
                            <img src="../../../media/icons/small-arrow.svg" alt="Freccia quantità">
                        </li>
                        <li>
                            <button class="btn-danger">Elimina</button>
                        </li>
                    </ul>
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
    name: 'ShopCart',
    props:{
        // msg: String
    },
    data(){
        return{
            //
        }
    },
    methods: {
        //
    }
}
</script>

<style scoped lang="scss">
@import '../../../sass/_variables.scss';

#ShopCart{
    padding-top: $top-heigth;
    min-height: 100px;
    
    .cart-top, .cart-center ul {
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
            padding-top: 40px;
        
            .top-tab {
                display: flex;
                justify-content: center;

                .dish {
                    width: 50%;
                }
                .price {
                    padding: 0 15px;
                }
                .quantity {
                    padding: 0 15px;

                }
            }


            ul {
            list-style: none;
            .name-dish {
                
                width: 50%;
                overflow: hidden;
            }
            .price-dish, .quantity-dish {
                padding: 0 15px;
            }
            }
            ul li {
            color: #FFFAE9;
            font-size: 1.5625rem;
            }
            ul li:nth-child(3) {
            display: flex;
            align-items: center;
                img {
                    height: 40px;
                }
                img:last-child {
                    transform: rotate(180deg);
                }
                span {
                    margin: 0 20px;
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
            margin-right: 4rem;
            color: #FFFAE9;

            }
            .btn-alert {
                color: $c-05;
            }
        }

}

</style>