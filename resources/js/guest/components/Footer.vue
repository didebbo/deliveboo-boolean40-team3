<template>
	<footer>
        <div class="footer-left">
			<img src="../../../media/images/logo-int-4x.png" alt="Logo DeliveBoo">
			<span>Sei un ristoratore? <a href="/register">Registrati</a></span>
        </div>
        <div class="footer-center">
			<ul>
				<li><router-link :to="{ name: 'home' }">
					Home
				</router-link></li>

				<li>|</li>

				<li>
					<a href="/login">login ristoratore</a>
				</li>

				<li>|</li>

				<li><router-link :to="{ name: 'about' }">
					Chi Siamo
				</router-link></li>

				<li>|</li>

				<li><router-link :to="{ name: 'shop-cart' }">
					Visualizza il Carrello
				</router-link></li>
			</ul>
        </div>
        <div class="footer-right">
			<a href="#"><img src="../../../media/icons/search-white.svg" alt="Icona ricerca"></a>
        </div>
	</footer>
</template>

<script>
export default {
	name: 'Footer'
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';

	footer {
		display: flex;
		justify-content: space-between;
		align-items: center;
		outline: $c-03 solid 5px;
		border-top-left-radius: 1.875rem;
		border-top-right-radius: 1.875rem;
		padding: 1.25rem 2.5rem;
		color: white;
		margin-top: 100px;

		.footer-left {
			display: flex;
			flex-direction: column;

			img {
				height: 30px;
			}

			span {
				color: white;
				margin-top: 1.25rem  ;
			}
			span a {
				text-decoration: underline;
				color: currentColor;
			}
		}

		.footer-center {
			ul {
				list-style: none;
				display: flex;
				transform: translateX(-80px); //centramento

				li{
					margin: 0 .3125rem;
					color: white;

					a{
						text-decoration: none;
						color: white;
					}
				}
			}
		}

		.footer-right {
			img {
				height: 20px;
			}
		}
	}

// Media Queries
	@media screen and (max-width: 1080px){
		.footer-center ul{
			transform: translateX(0) !important;
		}
	}
	@media screen and (max-width: 930px){
		.footer-center{
			max-width: 300px;
			text-align: center;

			ul{
				align-items: center;
			}

			li{
				margin: 0 15px;
			}
		}
	}
	@media screen and (max-width: 780px){
		.footer-center{
			display: none;
		}
	}
</style>