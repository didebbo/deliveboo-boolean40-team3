<template>
    <section id="PopularCategories">
        <div class="title">
            <h2>Cerca per <span>Categorie</span></h2>
            <div class="buttons-box">
                <button @click="clickBefore()">
                    <img src="../../../media/icons/small-arrow.svg" alt="">
                </button>
                <button @click="clickNext()">
                    <img src="../../../media/icons/small-arrow.svg" alt="">
                </button>
            </div>
        </div>
        <div class="carousel" ref="carousel">
            <router-link 
            :to="{ name: 'searchCat', params: { selCategory: category.name }}" 
            class="card" 
            v-for="category in homeCategories" 
            :key="category.id">

                <p class="food-title">
                    {{category.name}}
                </p>
                <div class="food">
                    <img src="../../../media/images/search-bg.jpg" alt="">
                </div>
                <div class="search_icon">
                    <img src="../../../media/icons/search-white.svg" alt="Ricerca">
                </div>

            </router-link>
        </div>
    </section>
</template>

<script>
export default {
    name: 'PopCategories',
    props:{
        // msg: String
    },
    data(){
        return{
            homeCategories: [],
        }
    },
    methods: {
        clickBefore(){
            let scroll = this.$refs.carousel.scrollLeft - 600;
            this.$refs.carousel.scroll({
                left: scroll,
                top: 0,
                behavior: "smooth",
            });
        },
        clickNext(){
            let scroll = this.$refs.carousel.scrollLeft + 600;
            this.$refs.carousel.scroll({
                left: scroll,
                top: 0,
                behavior: "smooth",
            });
        }
    },
    mounted() {
        axios.get('/api/categories')
		.then((response) => {
			let array = response.data.data;

			array.forEach(element => {
				this.homeCategories.push(element);
			});
		})
    }
}
</script>

<style scoped lang="scss">
@import '../../../sass/_variables.scss';

#PopularCategories {
    background: $c-05;
    padding: 3.125rem 0;

/* Hide scrollbar */
    -ms-overflow-style: none;  // IE and Edge
    .carousel {scrollbar-width: none;  } // Firefox
    ::-webkit-scrollbar {display: none; } //Chrome, Safari and Opera
/* Hide scrollbar */

    .title {
        margin-bottom: 3.75rem;
        position: relative;
        h2 {
            @include f-section-title;
            text-align: center;
        }
    }
    .buttons-box{
        position: absolute;
        top: 0;
        right: 25px;

        button{
            border: 4px solid $c-01;
            background: none;
            padding: 17px;
            margin-left: 20px;
            border-radius: 50%;
            position: relative;
            cursor: pointer;

            img{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(calc(-50% - 2px), -50%);
                height: 22px;
                width: 22px;
            }

            &:last-of-type img{
                transform: translate(calc(-50% + 2px), -50%) rotate(-180deg);
            }
        }
    }

    .carousel {
        display: flex;
        // justify-content: center;
        padding-left: 20%;
        overflow-x: auto;

        a{
            color: inherit;
            text-decoration: none;
        }

        .card {
            @include flex-center;
            position: relative;
            background: $c-03;
            padding: 5px;
            border-radius: 10%;
            box-shadow: $shadow-02;
            margin: 45px 1.25rem 20px 1.25rem;

            min-height: 100px;
            min-width: 164px;

            .food {
                position: absolute;
                width: 75px;
                height: 75px;
                left: 50%;
                top: 0;
                transform: translate(-50%, -50%);
                background: $c-03;
                border-radius: 50%;
                border: 3px solid white;
                overflow: hidden;
                @include img-fit-cover;
            }

            .food-title {
                text-align: center;
                font-size: 22px;
                margin-top: 10px;
            }

            .search_icon {
                width: 1.875rem;
                height: 1.875rem;
                background: $c-04;
                border-radius: 50%;
                bottom: -0.9375rem;
                left: 38%;
                position: absolute;

                img {
                    height: 16px;
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    transform: translate(-50%, -50%);
                }
            }
        }
    }
}

@media screen and (max-width: 730px){
    .buttons-box{
        display: none;
    }
}
</style>