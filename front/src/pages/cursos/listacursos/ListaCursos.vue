<template>
  <q-layout>
    <q-page-container>
      <q-page>
        <div class="row">
          <!-- Muestra los videos -->
          <div class="col-8 q-pa-md justify-center">
            <q-video
              :ratio="16 / 9"
              src="https://www.youtube.com/embed/k3_tw44QsZQ?rel=0"
            />
          </div>
          <!-- Card de videos del curso -->
          <div class="col q-pa-md">
            <q-card class="my-card">
              <q-card-section>
                <div class="text-h5">Lista de videos</div>
              </q-card-section>
              <q-list v-for="listavideos in getListaCursos" :key="listavideos.id">
                <q-item clickable>
                  <!-- <q-item-section avatar>
                    <q-icon color="primary" name="local_bar" />
                  </q-item-section> -->

                  <q-item-section>
                    <q-item-label class="text-h6">{{ listavideos.descripcion }}</q-item-label>
                    <q-item-label caption>{{ listavideos.nombre }}</q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>
            </q-card>
          </div>
          <!-- Termina lista de videos -->
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script>
export default {
  name: 'ListaCursos',
  computed: {
    getListaCursos () {
      return this.$store.getters.getListCursos
    }
  }
}
</script>

<style>
#video {
  height: 200px;
}
</style>
