<template>
  <q-layout>
      <q-page-container>
          <q-page>
            <div class="row justify-center">
              <div class="col-sm-8 q-pa-md">
              <div class="q-pa-md col items-start q-gutter-md">
                <!-- Se obtienen los cursos de la propiedad computada getCursos que a la vez se obtiene el arreglo
                de store/cursos.js -->
                <q-card class="my-card" v-for="curso in getCursos" :key="curso.id">
                <q-separator />
                <q-card-section class="bg-white text-black">
                  <div class="row">
                  <div id="img-curso" class="q-pa-md col-2">
                    <q-img :src='curso.urll' spinner-color="white" style="height: 140px; max-width: 500px"/>
                  </div>
                  <div class="col">
                    <div class="row">
                      <div class="col q-pa-md q-gutter-sm">
                        <div id="descripcion-cursor" class="text-h6" @click="goCurso(curso.id)">{{ curso.descripcion }}</div>
                        <div class="text-subtitle2">{{ curso.nombre }}</div>
                        <div class="text-h7">By: Julanito</div>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <div class="text-h7">cantidad horas</div>
                      </div>
                      <div class="col-2">
                        <q-card-actions align="right">
                          <div class="text-subtitle2">MX$ 500.00</div>
                        </q-card-actions>
                      </div>
                    </div>
                  </div>
                  </div>
                </q-card-section>
                <q-separator />
                <q-card-actions align="right">
                    <q-btn flat color="primary">Saber mas</q-btn>
                    <q-btn flat color="deep-orange">Unirme</q-btn>
                </q-card-actions>
                </q-card>
                <q-card>
                  <q-card-section>
                    <div class="text-h4"><q-btn id="icon-add" @click="addCurso" color="white" text-color="black" :label="add" /></div>
                    <!-- Este apartado se muestra cuando el admin presiona el signo de + -->
                    <!-- Nota: el admin solo podra ver este apartado -->
                    <div class="text-h6" v-show="showAdd">Crea tu nuevo curso</div>
                  </q-card-section>

                  <q-separator />
                  <!-- Este formulario se muestra cuando el admin presiona el signo de + -->
                  <q-card-section v-show="showAdd">
                    <div class="q-pa-md">
                      <div class="q-gutter-md" style="max-width: 300px">
                        <q-input outlined type="textarea" label="Descripcion" />
                        <q-input outlined label="Nivel" />
                        <q-input @input="val => { files = val }" multiple filled type="file" hint="Puedes elegir varios videos"/>
                      </div>
                    </div>
                      <q-card-actions align="right">
                        <q-btn flat color="deep-orange">Cancelar</q-btn>
                        <q-btn flat color="primary">Guardar</q-btn>
                      </q-card-actions>
                  </q-card-section>

                </q-card>
              </div>
              </div>
              </div>
          </q-page>
      </q-page-container>
  </q-layout>
</template>

<script>
export default {
  name: 'NuestrosCursos',
  data () {
    return {
      add: '+',
      showAdd: false
    }
  },
  methods: {
    addCurso () {
      if (this.add === '+') {
        this.showAdd = true
        this.add = '-'
      } else {
        this.showAdd = false
        this.add = '+'
      }
    },
    async goCurso (index) {
      this.$store.dispatch('goCurso', index)
      this.$router.push('/ListaCursos')
    }
  },
  computed: {
    getCursos () {
      return this.$store.getters.getCursos
    }
  }
}
</script>
<style scoped>
#descripcion-cursor{
  cursor: pointer;
}
#img-curso{
  border: 0px solid;
}
</style>
