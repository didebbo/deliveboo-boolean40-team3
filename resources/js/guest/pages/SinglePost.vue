<template>
	<div v-if="post" class="container">
		<h2>{{post.title}}</h2>
		<h3>Categoria: {{post.category.name}}</h3>
		<p>{{post.content}}</p>
	</div>
</template>

<script>
export default {
	name: 'SinglePost',
	data() {
		return {
			post: null
		}
	},
	mounted() {
		// http://localhost:8000/api/posts/accusamus-eos-ea-aut-ipsum
		// console.log(this.$route.params.slug);

		axios.get(`/api/posts/${this.$route.params.slug}`)
		.then((response) => {
			// handle success
			if( response.data.success ) {
				this.post = response.data.data;
			} else {
				// redirect 404
				this.$router.push({name: 'not-fount'});
			}
		})
		.catch( (error) => {
			// handle error
			console.log(error);
		})
	}
}
</script>
