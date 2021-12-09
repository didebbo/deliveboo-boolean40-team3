<template>
	<header>
        <div class="container-l">
            <div class="logo">
                <img src="../../../media/images/logo-int-4x.png" alt="">
            </div>
            <nav>
                <ul>
					<li><router-link :to="{ name: 'home' }">
						<p>Home</p>
					</router-link></li>

					<li><router-link :to="{ name: 'About' }"> <!-- TODO: Fare Pagina about-us -->
						<p>Chi siamo</p>
					</router-link></li>

					<li class="search"><router-link :to="{ name: 'search' }">
						<img src="../../../media/icons/search.svg" alt="">
					</router-link></li>

					<li class="shopping-cart" alt="il tuo carrello"><router-link :to="{ name: 'shop-cart' }"> <!-- TODO: fare pagina del carrello -->
						<p>{{nCart}}</p>
                        <img src="../../../media/icons/cart-white.svg" alt="">
					</router-link></li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
	name: 'Header',
	data() {
		return {
			nCart: 12,
		}
	}
}
</script>

<style lang="scss" scoped>
	@import '../../../sass/_variables.scss';

header{
    padding-top: 10px;
    width: 100%;
    position: fixed;
	z-index: 10;
	background-color: white;
	padding-bottom: .9375rem;
	border-bottom-left-radius: 30px;
	border-bottom-right-radius: 30px;
    top: 0;
    left: 0;
    .container-l{
        height: 62px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .logo{
        background-color: white;
        height: 50px;
        border-radius: 35px;
        padding: 12px;

        img{
            height: 100%;
        }
    }

    nav{
        margin-right: 50px;
        padding: 15px;
		a{
			color: $c-05;
			text-decoration: none;
		}
        ul{
            display: flex;
			// align-items: center;
            list-style: none;
            @include sans-semibold;
            position: relative;
            padding-right: 30px;
        }
        li{
            color: $c-05;
            text-transform: uppercase;
            margin-left: 25px;

            &.shopping-cart{
				a{
					color: white;
				}
                height: 62px;
                width: 62px;
                border-radius: 50%;
                overflow: hidden;
                position: absolute;
                top: 50%;
                transform: translate(-50%, -50%);
                left: 100%;

                background-color: $c-01;

                img, p{
                    position: absolute;
                    left: 50%;
                    transform: translateX(-50%);
                }

                img{
                    height: 25px;
                    bottom: 5px;
                }
                p{
                    top: 0px;
                    left: calc(50% + 2px);
                    font-size: 25px;
                }
            }

            &.search{
                img{
                    height: 20px;
                }
            }
        }
    }
}
</style>