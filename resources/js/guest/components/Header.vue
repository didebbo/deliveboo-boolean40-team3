<template>
	<header>
		<div class="container">
			<h1>Boolpress</h1>
			<nav>
				<ul>
					<li><router-link :to="{ name: 'home' }">Home</router-link></li>
					<li><router-link :to="{ name: 'about' }">Chi Samo</router-link></li>
					<li><router-link :to="{ name: 'contact' }">Contatti</router-link></li>
				</ul>
			</nav>
		</div>
	</header>
</template>

<script>
export default {
	name: 'Header'
}
</script>

<style lang="scss" scoped>
	header {
		background-color: #222;
		padding: 1.875rem 0;

		.container {
			display: flex;
			justify-content: space-between;
			align-items: center;

			ul {
				display: flex;

				li {
					list-style: none;
					a {
						color: #fff;
						text-decoration: none;
						text-transform: uppercase;
					}
					&:not(:last-child) {
						margin-right: 20px;
					}
				}
			}
		}
	}
</style>