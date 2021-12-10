<template>
	<section id="Search">
		<div id="top-search">
			<div class="img-top-box">
				<img src="../../../media/images/search-bg.jpg" alt="">
				<h1>Ricerca Avanzata</h1>
			</div>
			<div class="search-box">
				<!-- top-search inputs -->
				<div class="inputs">
					<!-- input name of restaurant -->
					<label for="restaurant-name">Ristorante:</label>
					<input name="restaurant-name" id="restaurant-name" type="text" placeholder="nome del ristorante">

					<!-- select city -->
					<label for="city-select">città:</label>
					<select name="city-select" id="city-select">
						<option value="mi">Milano</option>
					</select>
				</div>

				<!-- bottom-search / Categories -->
				<div class="categories">
					<h4>Categorie:</h4>
					<ul>
						<li class="active" v-for="category in categories" :key="category.id">
							<div><img src="../../../media/images/search-bg.jpg" alt=""></div>
							{{category.name}}
						</li>
					</ul>
				</div>
			</div>
			<img class="search-box-after-decoration" src="../../../media/images/search-box-after-decoration.png" alt="">
		</div>
	</section>
</template>

<script>
export default {
	name: 'SearchPage',
	props:{
		// msg: String
	},
	data(){
		return{
			categories: [],
		}
	},
	methods: {
		//
	},
	mounted() {
		axios.get('/api/categories')
		.then((response) => {
			let array = response.data.data;

			array.forEach(element => {
				this.categories.push(element);
			});
		})
	}
}
</script>

<style scoped lang="scss">
@import '../../../sass/_variables.scss';

#top-search{
	text-align: center;
	.img-top-box{
		width: 100%;
		height: 450px;
		overflow: hidden;

		img{
			height: 100%;
			width: 100%;
			object-fit: cover;
		}
		h1{
			@include f-hero-title;
		}
	}

	.search-box{
		height: 350px;
		width: 100%;
		background-color: $c-03;
		border-top-left-radius: 30px;
		border-top-right-radius: 30px;	
	}
	.search-box, .search-box-after-decoration{
		transform: translateY(-40px);
	}
	.search-box-after-decoration{
		width: 100%;
		height: 60px;
	}

	.inputs{
		padding: 30px;
		input, select{
			height: 30px;
			border: none;
			border-radius: 20px;
			padding: 0 10px;
			margin-right: 25px;
			margin-left: 5px;
		}
		input{
			width: 200px;
		}
	}

	.categories{
		ul{
			@include flex-center;
			flex-wrap: wrap;
			list-style: none;

			li{
				cursor: pointer;
				position: relative;
				margin: 15px;
				padding: 10px 20px 10px 55px;
				border-radius: 10px;
				background-color: $c-05;
				color: $text-light-white;

				div{
					position: absolute;
					height: 50px;
					width: 50px;
					border-radius: 50%;
					left: -5px;
					top: 50%;
					overflow: hidden;
					transform: translateY(-50%);
					@include img-fit-cover;
					background-color: $c-04;
					border: 3px solid white;
				}

				&.active{
					filter: drop-shadow($shadow-05);
					box-shadow: 0px 1px 0px $c-05;
					background-color: $c-02;
					color: black;
				}
			}
		}
	}
}

</style>