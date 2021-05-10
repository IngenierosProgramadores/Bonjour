<template>
  <q-layout>
      <q-page-container>
          <q-page>
              <div class="row justify-center">
                  <div class="col-sm-10">
                      <div class="q-pa-md">
                        <q-img src='../../../assets/imagenes/fotoinfo.jpg' spinner-color="white" style="height: 500px; max-width: 100%"/>
                      </div>
                  <div class="q-pa-md">
                      <q-card>
                          <q-card-section>
                              <div class="text-h6">Curso de Ingles A1</div>
                          </q-card-section>
                          <q-separator />
                          <q-card-section>
                              <div class="text-subtitle2">Descripcion del curso</div>
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, explicabo fuga aliquid iure error esse officiis voluptatum qui debitis ipsam adipisci placeat quod aliquam soluta, eaque commodi nisi distinctio reiciendis.
                          </q-card-section>
                      </q-card>
                  </div>
                  <div class="row">
                      <div class="col q-pa-md">
                          <q-card>
                              <q-card-section>
                                  <div class="text-subtitle2">Objetivo del curso</div>
                                  <ul>
                                      <li>Aprender Ingles</li>
                                      <li>Aprender Ingles</li>
                                      <li>Aprender Ingles</li>
                                  </ul>
                              </q-card-section>
                          </q-card>
                      </div>
                      <div class="col q-pa-md">
                          <q-card>
                              <q-card-section>
                                  <div class="text-subtitle2">A quien va dirigido?</div>
                                  <ul>
                                      <li>Humanos</li>
                                      <li>Humanos</li>
                                      <li>Humanos</li>
                                      <li>Humanos</li>
                                      <li>Humanos</li>
                                  </ul>
                              </q-card-section>
                          </q-card>
                      </div>
                  </div>
                  <div class="col q-pa-md">
                      <q-card>
                          <q-card-section>
                              <div class="text-subtitle1">Video Introductorio</div>
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente eaque totam quas quis fugiat natus nemo ratione esse perferendis, omnis, cum et sint. Debitis, in. Pariatur voluptas hic eum iure?
                          </q-card-section>
                          <q-card-section>
                              <q-video :ratio="16 / 9" src="https://www.youtube.com/embed/k3_tw44QsZQ?rel=0" />
                          </q-card-section>
                      </q-card>
                  </div>
                  <div class="row q-pa-md text-center">
                      <div class="col-8 q-pa-md">
                        <div class="text-h5">No dejes pasar esta oportunidad de aprender ingles de la mano de expertos</div>
                      </div>
                      <div class="col q-pa-md">
                        <q-btn flat color="deep-orange">Adquirir ahora</q-btn>
                      </div>
                  </div>
                  <div class="row q-pa-md text-center">
                      <div class="col-8 q-pa-md">
                          <div class="text-h4">Necesitas mas informacion?</div>
                      </div>
                      <div class="col q-pa-md">
                          <q-btn flat color="amber">Contactanos</q-btn>
                      </div>
                  </div>
                  </div>
              </div>
          </q-page>
      </q-page-container>
  </q-layout>
</template>

<script>
export default {

}
</script>

<style>

</style>
