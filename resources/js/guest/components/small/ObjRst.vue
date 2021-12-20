<template>
  <div id="ObjRst">

    <div class="rst-card">

      <div class="rst-img">
        <template v-if="url">
          <img :src="'/storage/' + url" alt="">
        </template>
        <template v-else>
          <img :src="require('../../../../media/images/segnaposto-rest.jpeg')" alt="">
        </template>
      </div>

      <div class="name-rst">
        <p>{{nameRst}}</p>
      </div>

    </div>


  </div>
</template>

<script>
export default {
  name: 'ObjRst',
  props:{
    nameRst: String,
    typeRst: String,
    url: String,
  },
  data(){
    return{
      //
    }
  }
}
</script>

<style scoped lang="scss">
@import '../../../../sass/_variables.scss';

#ObjRst {
  background-color: $c-05;
  margin: 60px 20px;

  .rst-card {
    background-color: #FFFAE9;
    border-radius: 30px;
    height: 155px;
    width: 580px;
    margin: 20px auto;
    padding: 20px 20px 20px 230px;
    position: relative;

    .rst-img {
      width: 220px;
      height: 120%;
      border: 5px solid $c-04;
      border-radius: 15px;
      position: absolute;
      overflow: hidden;
      left: -10px;
      top: 50%;
      transform: translateY(-50%);
      background-color: $c-04;
      @include img-fit-cover;
    }

    .name-rst {
      @include flex-center;
      justify-content: flex-start;
      height: 100%;
      p {
        @include f-title-card;
        text-decoration: none !important;
      }
    }
  }
}
@media screen and (max-width: 623px){
  .rst-card {
    width: 530px;
  }
}
@media screen and (max-width: 571px){
  .rst-card {
    width: 100%;
    padding: 20px 20px 20px 157px;
  }
  .rst-img {
    width: 150px;
  }
}
@media screen and (max-width: 502px){
  .rst-card {
    padding: 20px 20px 20px 118px;
  }
  .rst-img {
    width: 115px;
  }
}
</style>