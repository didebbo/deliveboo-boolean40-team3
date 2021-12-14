<template>
    <section id="ShopCart">
        Questo è il tuo carrello

        <p>
            <a style="color: red; display:inline-block; font-size: 50px; margin: 40px;" href="/orders/create">Completamento Ordine</a>
        </p>
    </section>
</template>

<script>
export default {
    name: 'ShopCart',
    props:{
        // msg: String
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

#ShopCart{
    padding-top: $top-heigth;
    min-height: 100px;
}

</style>