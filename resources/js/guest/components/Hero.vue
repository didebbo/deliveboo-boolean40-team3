<template>
    <section id="Hero" :style="`background-image: url(${require('../../../media/images/' + url)})`">
        <div class="container-m">
            <div>
                <h2>{{headline}}</h2>
                <router-link class="rst-search-btn" :to="{ name: 'search' }">		
                        <button class="btn-dark">Cerca un Ristorante</button>
				</router-link>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Hero',
    props:{
        url: String,
        headline: String,
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

#Hero{
    height: 560px;
    background-color: $c-04;
    width: 100%;
    // border-bottom-left-radius: 65px;
    border-radius: 30px;
    background-size: cover;
    background-position: center center;

    [class^="container-"]{
        position: relative;
        height: 100%;
        div{
            position: absolute;
            bottom: 50px;
            left: 15px;
        }
    }

    h2{
        @include f-hero-title;
        max-width: 800px;
    }
    .rst-search-btn {
        
        text-decoration: none;
    }
    button{
        margin-top: 15px;
    }
}

</style>