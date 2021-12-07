<template>
	<section>
		<div class="container">
			<h2>Lista tutti post</h2>
			<div class="posts">
				<PostCard v-for="post in posts" :key="post.id" :data="post"/>
			</div>
		</div>
	</section>
</template>

<script>
import PostCard from './PostCard.vue';

	export default {
		name: 'Posts',
		components: {
			PostCard
		},
		data() {
			return {
				posts: []
			}
		},
		mounted() {
			axios.get('/api/posts')
			.then((response) => {
				// handle success
				this.posts = response.data.data;
			})
			.catch( (error) => {
				// handle error
				console.log(error);
			})
		}
	}
</script>

<style lang="scss" scoped>
	section {
		padding: 1.875rem;
	}
	.posts {
		display: flex;
		flex-wrap: wrap;
		margin: auto -5px;

		> * {
			width: calc(100% / 3 - 10px);
			margin: 10px 5px;
		}
	}
</style>