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
            <!-- Se inicia el apartado de agregar comentarios -->
            <q-card>
              <q-card-section>
                <div class="text-h6">Haz un comentario</div>
              </q-card-section>

              <q-separator />

              <q-card-section>
                 <q-input outlined type="textarea" label="Comentario" />
                 <q-card-actions align="right">
                        <q-btn flat color="deep-orange">Cancelar</q-btn>
                        <q-btn flat color="primary">Comentar</q-btn>
                 </q-card-actions>
              </q-card-section>
            </q-card>
            <!-- Se termina el apartado de agregar comentarios -->
            <!-- Se inicia el apartado de comentarios -->
            <q-card>
              <q-card-section>
                <div class="text-h6">Comentarios</div>
              </q-card-section>
              <q-separator />

              <q-card-section>
                <div class="row">
                  <div class="col-10">
                    <div class="text-h6">Isaac Barragan</div>
                  </div>
                  <div class="col">
                    <div class="text-6">Hace un dia</div>
                  </div>
                </div>
                </q-card-section>
                <q-card-section class="q-pt-none">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur in pariatur, maxime eveniet omnis sunt. Sed deleniti vel recusandae accusantium modi vitae quos ab eum exercitationem? Odit harum inventore obcaecati?
                </q-card-section>

            </q-card>
          </div>
          <!-- Card de videos del curso -->
          <div class="col q-pa-md">
            <q-card class="my-card">
              <q-card-section>
                <div class="text-h5">Lista de videos</div>
              </q-card-section>
              <q-separator />
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
