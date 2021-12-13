<template>
	<section id="Ristorante">
		pagina ristorante {{id}}
	</section>
</template>

<script>
export default {
	name: 'Ristorante',
	props:{
		id: Number
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

#Ristorante{
	padding-top: $top-heigth;
}

</style>