<template>
  <q-page class="absolute-top">
    <!-- <img
      alt="Quasar logo"
      src="../assets/Recurso4.png"
    > -->
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <q-carousel
          arrows
          animated
          swipeable
          v-model="slide"
          :height="windowHeight"
          infinite
          autoplay
        >
          <q-carousel-slide name="first" img-src="../assets/imagenes/foto1.jpg">
            <div class="absolute-center custom-caption my-font">
              <div class="text-h2">HABLAR UN NUEVO IDIOMA <br>EXPANDE TUS FRONTERAS</div>
            </div>
          </q-carousel-slide>
          <q-carousel-slide name="second" img-src="../assets/imagenes/foto2.jpg">
            <div class="absolute-center custom-caption-2 my-font">
              <div class="text-h2">APRENDE DESDE LA <br>COMODIDAD DE TU <br>HOGAR</div>
            </div>
          </q-carousel-slide>
          <q-carousel-slide name="third" img-src="../assets/imagenes/foto3.jpg">
            <div class="absolute-center custom-caption-3 my-font">
              <div class="text-h2">¡A CULAQUIER HORA Y <br> A TU PROPIO RITMO!</div>
            </div>
          </q-carousel-slide>
        </q-carousel>
      </div>
        <div class="col-md-1 col-xs-1 absolute-right" style="margin-top: 31%;">
          <div class="q-pa-md q-gutter-xs q-ml-md">
            <q-btn round fab-mini>
              <q-avatar size="60px">
                <img src="../assets/iconos/iconowhatsapp.png">
              </q-avatar>
            </q-btn>
            <q-btn round fab-mini type="a" href="https://web.facebook.com/menesesbarragan/" target="__blank">
              <q-avatar size="60px">
                <img src="../assets/iconos/iconomessenger.png">
              </q-avatar>
            </q-btn>
            <q-btn round fab-mini>
              <q-avatar size="60px">
                <img src="../assets/iconos/iconotelegram.png">
              </q-avatar>
            </q-btn>
          </div>
        </div>
    </div>
  </q-page>
</template>
<script>
export default {
  name: 'Index',
  data () {
    return {
      slide: 'first'
    }
  },
  created () {
    this.windowHeight = window.innerHeight + 'px'
  }
}
</script>
<style lang="sass" scoped>
.custom-caption
  text-align: center
  padding: 15px
  width: 40%
  color: white
  border-radius: 50px
  background-color: rgba(0, 0, 0, .3)
.custom-caption-2
  text-align: center
  padding: 10px
  width: 35%
  margin-left: 20%
  margin-top: 5%
  border-radius: 50px
  color: white
  background-color: rgba(0, 0, 0, .3)
.custom-caption-3
  text-align: center
  padding: 10px
  width: 35%
  margin-top: -7%
  margin-left: -18%
  border-radius: 50px
  color: white
  background-color: rgba(0, 0, 0, .3)
.my-font
    font-family: 'HashedBrowns'
</style>
