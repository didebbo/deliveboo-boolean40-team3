<template>
	<section id="Search">
		<section id="top-search">
			<div class="img-top-box">
				<img src="../../../media/images/search-bg.jpg" alt="">
				<h1>Ricerca Avanzata</h1>
			</div>
			<div class="search-box">
				<!-- top-search inputs -->
				<div class="inputs">
					<!-- input name of restaurant -->
					<div>
						<label for="restaurant-name">Ristorante:</label>
						<input name="restaurant-name" id="restaurant-name" type="text" placeholder="nome del ristorante" v-model="srcName" @change="getRestaurants()">
					</div>

					<!-- select city -->
					<div>
						<label for="city-select">città:</label>
						<select name="city-select" id="city-select" @change="getRestaurants()" v-model="srcCity">
							<option value="milan">Milano</option>
							<!-- <option value="torino">Torino</option> -->
						</select>
					</div>
				</div>

				<!-- bottom-search / Categories -->
				<div class="categories">
					<h4>Categorie:</h4>
					<ul>
						<li  :id="`cat-li-${category.name}`" v-for="category in categories" :key="category.id" @click="toggleActive(category.name)">
							<div><img src="../../../media/images/search-bg.jpg" alt=""></div>
							{{category.name}}
						</li>
					</ul>
				</div>
			</div>
			<img class="search-box-after-decoration" src="../../../media/images/search-box-after-decoration.png" alt="">
		</section>

		<!-- Lista Ristoranti -->
		<section id="restaurants-list">

			<router-link 
			:to="{ name: 'ristorante', params: { id: restaurant.id }}" 
			v-for="restaurant in restaurantList" 
			:key="restaurant.id">

				<ObjRst :nameRst="restaurant.name" :url="restaurant.url_picture" />

			</router-link>

		</section>

	</section>
</template>

<script>
import ObjRst from '../components/small/ObjRst.vue'

export default {
	name: 'SearchPage',
	components: {
		ObjRst
	},
	props:{
		selCategory: null,
	},
	data(){
		return{
			categories: [],
			activeCategories: [],
			restaurantList: null,
			srcName: "",
			srcCity: "milan",

			srcParams:{},
		}
	},
	methods: {
		toggleActive(elmName) {
			let elm = document.getElementById(`cat-li-${elmName}`).classList;

			if ( elm == "active") {
				elm.remove("active");
				this.activeCategories = this.activeCategories.filter(cat => cat != elmName);
			} else if (elm !== "active" ) {
				elm.add("active");
				this.activeCategories.push(elmName);
			}

			this.getRestaurants();
		},

		getRestaurants() {
			this.srcParams = {};

			// controllo categorie
			this.activeCategories != "" ? this.srcParams["categories"] = this.activeCategories.toString() : null;
			// Controllo Nome
			this.srcName != "" ? this.srcParams["name"] = this.srcName : null;

			// set city
			this.srcParams["city"] = this.srcCity

			axios.get("/api/restaurants", {
				params: this.srcParams
			})
				.then((response) => {
					this.restaurantList = response.data.data;
					console.log(response.data.data);
				});
		},

	},
	mounted() {
		axios.get('/api/categories')
		.then((response) => {
			let array = response.data.data;

			array.forEach(element => {
				this.categories.push(element);
			});
		});


		this.$nextTick(function () {

			if(this.selCategory){
				setTimeout(() => {
					this.toggleActive(this.selCategory)
				}, 800);
			} else {
				this.getRestaurants()
			}
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
		min-height: 350px;
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
		@include flex-center;
		flex-wrap: wrap;
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
			max-width: 1000px;
			margin: auto;

			li{
				cursor: pointer;
				position: relative;
				margin: 15px;
				padding: 10px 20px 10px 55px;
				border-radius: 10px;
				background-color: $c-05;
				color: $text-light-white;
				transition: 0.5s;

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

#restaurants-list{
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	a{
		text-decoration: none;
	}
}

@media screen and (max-width: 670px ){
	.search-box-after-decoration {
		height: 30px !important;
	}
}
@media screen and (max-width: 518px){
	#city-select{
		margin-top: 15px;
	}
}
@media screen and (max-width: 350px ){
	.search-box-after-decoration {
		display: none !important;
	}
}
</style>