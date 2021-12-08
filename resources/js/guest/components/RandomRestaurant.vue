<template>
    <section id="RandomRestaurant">
        <h3>Non sai dove mangiare? Provane uno casuale</h3>
        <h2><span>Ristorante</span> Random</h2>
        <div>
            <div class="text-box">
                <div class="img-box">
                    <img id="random" :src="rImg" alt="">
                </div>
                <p>lasciati proporre un Ristorante Casuale</p>
                <button class="btn-danger">Estrai</button>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'RandomRestaurant',
    props:{
        // msg: String
    },
    data(){
        return{
            rImg: "https://images.pexels.com/photos/2641886/pexels-photo-2641886.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        }
    },
    methods: {
        //
    }
}
</script>

<style scoped lang="scss">
@import '../../../sass/_variables.scss';

#RandomRestaurant{
    text-align: center;
    margin-top: 40px;
    h2{
        @include f-section-title;
    }
    h3, p{
        @include f-corpo-white;
    }

    &>div{
        position: relative;
        display: flex;
        justify-content: center;
    }
    .text-box{
        position: relative;
        background-color: $c-04;
        margin-top: 100px;
        padding: 25px 50px 25px 450px;
        border-radius: 30px;
        @include flex-col-center;

        button{
            margin-top: 20px;
        }

        .img-box{
            height: 280px;
            width: 410px;
            background-color: coral;
            border-radius: 20px;
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            overflow: hidden;

            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
    }
}
</style>