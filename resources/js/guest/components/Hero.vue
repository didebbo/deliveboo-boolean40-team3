<template>
    <section id="Hero" :style="`background-image: url(${require('@/assets/media/imgs/' + url)})`">
        <div class="container-m">
            <div>
                <h2>{{headline}}</h2>
                <button class="btn-dark">Cerca un Ristorante</button>
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
    height: 500px;
    width: 100%;
    border-bottom-left-radius: 65px;
    background-size: cover;
    background-position: center center;

    [class^="container-"]{
        position: relative;
        height: 100%;
        div{
            position: absolute;
            bottom: 50px;
            left: 0;
        }
    }

    h2{
        @include f-hero-title;
        max-width: 800px;
    }
    button{
        margin-top: 15px;
    }
}

</style>