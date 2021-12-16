<template>
	<div id="notfound-page">
		<div>
			<img src="../../../media/images/notfound-tomato.png" alt="">
			<h1>Errore 404: Pagina non trovata</h1>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'NotFound'
	}
</script>

<style scoped lang="scss">
@import '../../../sass/_variables.scss';

#notfound-page{
	padding-top: $top-heigth;
	@include flex-center;
	min-height: calc(100vh - 211px);
	>div{
		@include flex-center;
		img{
			max-width: 650px;
			filter: drop-shadow(0px 0px 8px 0px rgba(0,0,0,0.7));
		}
		h1{
			color: white;
			position: relative;
			left: -70px;
			font-size: 3.5rem;
		}
	}
}
</style>
