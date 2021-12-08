<template>
    <section id="ShopCart">
        Questo è il tuo carrello
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
}

</style>