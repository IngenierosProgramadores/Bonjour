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
    <div class="row">
      <div class="col-md-12 q-pa-xl">
        <div class="text-h4 text-center">
          <i><b>¿POR QUÉ ELEGIR NUESTRA OPCIÓN?</b> </i>
        </div>
      </div>
      <div class="col-md-6 q-pa-xl text-right">
          <q-img
          src="../assets/iconos/rapidex.png"
          style="width: 15%"
          >
          </q-img><br>
          <div for="" class="q-pt-md text-h6">Rápido aprendizaje</div>
      </div>
      <div class="col-md-6 q-pa-xl text-left">
          <q-img
          src="../assets/iconos/2metas.png"
          style="width: 15%"
          >
          </q-img><br>
          <div for="" class="q-pt-md text-h6">Trabajo por objetivos</div>
      </div>
      <!-- Parte 2 de imagenes -->
      <div class="col-md-5 text-right">
          <q-img
          src="../assets/iconos/3compromiso.png"
          style="width: 15%"
          >
          </q-img><br>
          <div for="" class="q-pt-md text-h6">Soporte garantizado</div>
      </div>
      <div class="col-md-2 text-center">
          <q-img
          src="../assets/iconos/4certificado.png"
          style="width: 37%"
          >
          </q-img><br>
          <div for="" class="q-pt-md text-h6">Certificación</div>
      </div>
      <div class="col-md-5 text-left">
          <q-img
          src="../assets/iconos/5facilacceso.png"
          style="width: 15%"
          >
          </q-img><br>
          <div for="" class="q-pt-md text-h6">Facíl acceso a los cursos</div>
      </div>
      <div class="col-md-12 q-pa-xl">
        <div class="text-h4 text-center">
          <i><b>CONOCE NUESTRA HISTORIA</b> </i><br>
          <q-btn label="Ver más" color="pink" rounded no-caps class="q-mt-md"></q-btn>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <div class="row bg-dark text-white text-h5">
      <!-- Encabezados -->
      <div class="col-md-1"></div>
      <div class="col-md-3 q-pt-xl q-pl-md">
          <img src="../assets/header.png" height="50px" @click="main()">
      </div>
      <div class="col-md-4 q-pt-xl text-center">
         <i>REDES SOCIALES</i>
      </div>
      <div class="col-md-4 q-pt-xl text-center">
         <i>ACERCA DE</i>
      </div>
      <!-- Datos -->
      <div class="col-md-1"></div>
      <div class="col-md-3  q-pl-md q-pt-md text-justify" style="font-size: 15px; line-height: 20px">
        <p>
          Prisciliano Sánchez #1105,<br>
          Col. Americana, <br>
          Guadalajara, Jalisco. México. <br>
          322 192 1823 <br>
          info@bonjourvallarta.com
        </p>
      </div>
      <div class="col-md-4 text-h6 text-center">
        <div class="">
          <q-btn round fab-mini>
            <q-avatar size="50px">
              <img src="../assets/iconos/fbicon.png">
            </q-avatar>
          </q-btn>
          <q-btn round fab-mini>
            <q-avatar size="50px">
              <img src="../assets/iconos/twicon.png">
            </q-avatar>
          </q-btn>
          <q-btn round fab-mini>
            <q-avatar size="50px">
              <img src="../assets/iconos/yticon.png">
            </q-avatar>
          </q-btn>
          <q-btn round fab-mini type="a" href="" target="__blank">
            <q-avatar size="50px">
              <img src="../assets/iconos/instaicon.png">
            </q-avatar>
          </q-btn>
        </div>
        <div style="font-size: 14px" class="q-pt-xl">
          <label for=""> &copy; Copyright 2021 - Academia de lenguaje BONJOUR VALLARTA. </label><br>
          <label for=""> Powered by: QUETZALCORE</label>
        </div>
      </div>
      <div class="col-md-4 text-h6" style="padding-left: 180px">
        <div style="font-size: 15px">
          <q-btn style="font-size: 15px" label="Términos" flat no-caps></q-btn><br>
          <q-btn  style="font-size: 15px" label="Privacidad" flat no-caps></q-btn><br>
          <q-btn style="font-size: 15px" label="Ayuda" flat no-caps></q-btn><br>
          <q-btn style="font-size: 15px" label="Desarrollador" flat no-caps></q-btn><br>
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
