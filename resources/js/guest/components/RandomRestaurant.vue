<template>
    <section id="RandomRestaurant">
        <h3>Non sai dove mangiare? Provane uno casuale</h3>
        <h2><span>Ristorante</span> Random</h2>
        <div>
            <div class="text-box">
                    <img id="random-icon" src="../../../media/icons/random.svg" alt="">
                <div class="img-box">
                    <img id="random" src="https://images.pexels.com/photos/315755/pexels-photo-315755.jpeg?cs=srgb&dl=pexels-pixabay-315755.jpg&fm=jpg" alt="">
                </div>
                <p>lasciati proporre un Ristorante Casuale</p>


                <button class="btn-danger" @click="goToRandom()">Estrai</button>
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
            //
        }
    },
    methods: {
        goToRandom(){
            axios.get("/api/restaurants")
				.then((response) => {
					let list = response.data.data;
                    let ids= [];
                    ids = list.map(x => x.id);


                    let choose = Math.floor(Math.random() * ids.length);
                    
                    this.$router.push({ name: 'ristorante', params: { id: ids[choose] } })
				});
        }
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

            img#random{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
        img#random-icon{
            height: 100px;
            position: absolute;
            top: 50%;
            left: 435px;
            z-index: 2;
            transform: translate(-100%, -50%);
            filter: drop-shadow($shadow-01);
        }
    }
}
</style>