<template>
	<section>
		<div class="container">
			<h2>{{category.name}}</h2>
			<h3>Lista post associati</h3>
			<div>
				<PostCard v-for="post in category.posts" :key="post.id" :data="post"/>
			</div>
		</div>
	</section>
</template>

<script>
import PostCard from '../components/PostCard';

export default {
	name: 'SingleCategory',
	components: {
		PostCard
	},
	data() {
		return {
			category: null
		}
	},
	mounted() {
		// http://localhost:8000/api/categories/html
		// console.log(this.$route.params.slug);

		axios.get(`/api/categories/${this.$route.params.slug}`)
		.then((response) => {
			// handle success
			this.category = response.data.data;
		})
		.catch( (error) => {
			// handle error
			console.log(error);
		})
	}
}
</script>
