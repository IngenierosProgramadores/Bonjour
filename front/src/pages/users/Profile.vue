<template>
      <q-page>
        <!-- <div class="q-pa-sm panel-header">
          <div class="row">
            <div class="col-sm-8">
              <div class="q-pa-md q-gutter-sm">
                <q-breadcrumbs align="left" style="font-size: 24px">
                  <q-breadcrumbs-el label="Perfíl de Usuario" />
                </q-breadcrumbs>
              </div>
            </div>
          </div>
        </div> -->

        <div class="row justify-center">
          <div class="col-xs-6 col-md-2 q-pa-md">
            <div class="row q-col-gutter-sm bg-white border-panel">
              <div class="col-xs-12 col-sm-12">
                <div class="q-pa-md text-left" style="padding-bottom: 0px">
                    <q-avatar size="130px" color="" text-color="white">
                      <!-- <img v-if="this.user.fields.img !== null" :src="'http://localhost/Bonjour/back/public/' + user.fields.img"/> -->
                      <img :src="'http://localhost/Bonjour/front/src/assets/Avatares/' + avatar" alt="Perfil">
                      <!-- <img :src="this.man" alt="Perfil" style="padding: 5px"> -->
                    </q-avatar>
                </div>
                <br>
                <div class="q-pa-md text-left" style="font-size: 17px">
                    <label for="" class="text-bold text text-grey-9">MI CUENTA</label>
                    <hr>
                    <q-btn @click="changeModal(1)" flat class="full-width" align="left" dense no-caps>Mi Perfil</q-btn><br>
                    <q-btn @click="changeModal(2)" flat class="full-width" align="left" dense no-caps>Fotografía</q-btn><br>
                    <q-btn flat class="full-width" align="left" dense no-caps>Insignias</q-btn><br>
                    <q-btn flat class="full-width" align="left" dense no-caps>Detalles</q-btn><br>
                    <q-btn flat class="full-width" align="left" dense no-caps>Cerrar Sesión</q-btn><br>
                </div>
                <br><br>
                <div class="q-pa-md text-left" style="font-size: 17px">
                    <label for="" class="text-bold text text-grey-9">MIS CURSOS</label>
                    <hr>
                    <q-btn v-for="(value,key) in classes" highlight separator  v-bind:key="key" flat class="full-width" align="left" dense no-caps>{{ value }}</q-btn><br>
                    <br>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-4 q-pa-md">
            <div class="row bg-white border-panel" v-show="this.options.profile">
              <div class="col-sm-12">
                <div class="q-pa-md text-center">
                    <label for="" class="text-h4 text-bold text-grey-9">¡Haz tu mejor pose!</label><hr>
                </div>
                <div class="q-pad-md text-center">
                  <label for="" class="text-h6">Personaliza aún más tu perfil <br>con una fotografía tuya</label>
                </div>
                <br>
                <div class="q-pa-md row ">
                  <q-field filled class="col-sm-12 bg-accent">
                    <input
                      type="file"
                      bg-color="none"
                      ref="photoProductRef"
                      accept=".jpg, image/*"
                      style="display: none;"
                      name="imagen"
                      @change="uploadPhoto"
                    />
                    <template v-slot:control>
                      <div class="self-center full-width no-outline text-white text-h6 text-center" tabindex="0">Foto de Perfil</div>
                    </template>
                    <template v-slot:append>
                      <q-btn round dense flat icon="add" color="white"  @click="changePP()"/>
                      <!-- <q-badge color="red" floating>No hay imagen cargada</q-badge> -->
                    </template>
                    <template v-slot:prepend>
                    <q-icon color="white" name="camera" />
                  </template>
                  </q-field>
                </div>
              </div>
            </div>
            <div class="row bg-white border-panel" v-show="this.options.profile">
              <div class="col-sm-12">
                <div class="q-pa-md text-center">
                    <label for="" class="text-h4 text-bold text text-grey-9">Mi perfil</label><hr>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12">
                <q-input
                  name="name"
                  color="accent"
                  bg-color="white"
                  outlined
                  label-color="accent"
                  v-model="user.fields.description"
                  label="Descripción"
                >
                </q-input>
              </div>
              <div class="col-x2-12 col-sm-12">
                <div class="q-pa-md text-left">
                    <label for="" class="text-h6 text-bold text text-grey-9">Selecciona tu Avatar</label><hr>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="q-pa-sm text-center">
                    <q-avatar size="100px" color="" text-color="white" @click="sex(1)">
                      <img src="../../assets/Avatares/man.png" alt="Perfil" style="padding: 5px">
                    </q-avatar>
                    <q-avatar size="100px" color="" text-color="white" @click="sex(2)">
                      <img src="../../assets/Avatares/woman.png" alt="Perfil" style="padding: 5px">
                    </q-avatar>
                    <q-avatar size="100px" color="" text-color="white" @click="sex(3)">
                      <img src="../../assets/Avatares/gay.png" alt="Perfil" style="padding: 5px">
                    </q-avatar>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="q-pa-md text-left">
                    <label for="" class="text-h6 text-bold text text-grey-9">Información de contacto</label><hr>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <q-input
                  name="name"
                  color="accent"
                  bg-color="white"
                  outlined
                  label-color="accent"
                  v-model="user.fields.name"
                  label="Nombre"
                  :rules="nameRules"
                  @input="v => { user.fields.name = v.toUpperCase() }"
                >
                  <template v-slot:prepend>
                    <q-icon name="fas fa-signature" color="accent"/>
                  </template>
                </q-input>
              </div>
              <div class="col-xs-12 col-sm-6">
                <q-input
                  color="accent"
                  bg-color="white"
                  outlined
                  label-color="accent"
                  :rules="surnamesRules"
                  v-model="user.fields.surname"
                  label="Apelidos"
                  @input="v => { user.fields.surname = v.toUpperCase() }"
                >
                  <template v-slot:prepend>
                    <q-icon name="fas fa-signature" color="accent" />
                  </template>
                </q-input>
              </div>
              <div class="col-xs-12 col-sm-6">
                <q-input
                  color="accent"
                  bg-color="white"
                  outlined
                  label-color="accent"
                  :rules="emailRules"
                  v-model="user.fields.email"
                  label="Correo electrónico"
                >
                  <template v-slot:prepend>
                    <q-icon name="fas fa-at" color="accent"/>
                  </template>
                </q-input>
              </div>
              <div class="col-xs-12 col-sm-6 text-center ">
                  <q-select
                  color="accent"
                  bg-color="white"
                  outlined
                  :rules="birthdateRules"
                  mask="date"
                  label-color="accent"
                  v-model="user.fields.birthdate"
                  label="Fecha de Nacimiento">
                  <template v-slot:prepend>
                      <q-icon name="event" color="accent"></q-icon>
                  </template>
                  <q-popup-proxy ref="birthdate_ref" transition-show="scale" transition-hide="scale" >
                      <div class="col-sm-6">
                          <q-date
                          color="accent"
                          text-color="white"
                          v-model="user.fields.birthdate"
                          mask="DD/MM/YYYY"
                          @input="() => $refs.birthdate_ref.hide()"
                          today-btn>
                          </q-date>
                      </div>
                  </q-popup-proxy>
                  </q-select>
              </div>
              <div class="col-xs-12 col-sm-6">
                <q-input
                  color="accent"
                  bg-color="white"
                  outlined
                  label-color="accent"
                  :rules="passwordRules"
                  v-model="user.fields.password"
                  label="Contraseña"
                  :type="isPwd ? 'password' : 'text'"
                >
                  <template v-slot:prepend>
                    <q-icon name="fas fa-key" color="accent" />
                  </template>
                  <template v-slot:append>
                    <q-icon
                      :name="isPwd ? 'visibility_off' : 'visibility'"
                      class="cursor-pointer"
                      color="accent"
                      @click="isPwd = !isPwd"
                    />
                  </template>
                </q-input>
              </div>
              <div class="col-xs-12 col-sm-6">
                <q-select
                  color="accent"
                  bg-color="white"
                  outlined
                  label-color="accent"
                  :rules="genderRules"
                  :options="genders"
                  v-model="user.fields.gender"
                  label="Sexo"
                >
                  <template v-slot:prepend>
                    <q-icon name="supervisor_account" color="accent"/>
                  </template>
                </q-select>
              </div>
              <div class="col-xs-12 col-sm-6">
                <q-input
                  color="accent"
                  bg-color="white"
                  outlined
                  label-color="accent"
                  :rules="countryRules"
                  v-model="user.fields.country"
                  @input="v => { user.fields.country = v.toUpperCase() }"
                  label="País"
                >
                  <template v-slot:prepend>
                    <q-icon name="map" color="accent" />
                  </template>
                </q-input>
              </div>
              <div class="col-xs-12 col-sm-6">
                <q-input
                  color="accent"
                  bg-color="white"
                  outlined
                  label-color="accent"
                  mask="##########"
                  v-model="user.fields.phone"
                  label="Teléfono"
                >
                  <template v-slot:prepend>
                    <q-icon name="contact_phone" color="accent"/>
                  </template>
                </q-input>
              </div>
              <div class="col-xs-12 col-sm-12">
                <q-btn  color="positive" style="float: right; margin-top:12px; background: #5404a4 " icon="how_to_reg" label="Actualizar" @click="updateUser()" />
              </div>
            </div>
          </div>
        </div>
      </q-page>
</template>
<script>
const { required, maxLength, email } = require('vuelidate/lib/validators')
import api from '../../commons/api'
export default {
  name: 'Profile',
  validations: {
    user: {
      fields: {
        email: { required, maxLength: maxLength(30), email },
        name: { required, maxLength: maxLength(30) },
        surname: { required, maxLength: maxLength(30) },
        password: { required, maxLength: maxLength(15) },
        repPassword: { required, maxLength: maxLength(15) },
        birthdate: { required },
        country: { required },
        gender: { required }
      }
    }
  },
  created () {
    this.fetchFromServer()
  },
  data () {
    return {
      avatar: 'man.png',
      user: {
        fields: {
          name: null,
          surname: null,
          email: null,
          password: null,
          repPassword: null,
          birthdate: null,
          country: null,
          gender: null,
          phone: null,
          description: null,
          img: null
        }
      },
      classes: ['Inglés A1', 'Inglés A2', 'Inglés A3'],
      genders: ['MASCULINO', 'FEMENINO', 'PERSONALIZADO'],
      isPwd: true,
      isPwdR: true,
      selectedFile: null,
      url: 'http://localhost/Bonjour/back/public/',
      options: {
        profile: true,
        photo: false
      }
    }
  },
  computed: {
    emailRules (val) {
      return [
        val => (this.$v.user.fields.email.required) || 'El campo Correo electrónico es requerido.',
        val => (this.$v.user.fields.email.maxLength) || 'El campo Correo electrónico no debe exceder los 30 dígitos.',
        val => (this.$v.user.fields.email.email) || 'El campo Correo electrónico debe contener una dirección de correo electrónico válida.'
      ]
    },
    nameRules (val) {
      return [
        val => (this.$v.user.fields.name.required) || 'El campo Nombre es requerido.',
        val => (this.$v.user.fields.name.maxLength) || 'El campo Nombre no debe exceder los 30 dígitos.'
      ]
    },
    surnamesRules (val) {
      return [
        val => (this.$v.user.fields.name.required) || 'El campo Apellidos es requerido.',
        val => (this.$v.user.fields.name.maxLength) || 'El campo Apellidos no debe exceder los 30 dígitos.'
      ]
    },
    passwordRules (val) {
      return [
        val => (this.$v.user.fields.password.required) || 'El campo Contraseña es requerido.'
      ]
    },
    repPasswordRules (val) {
      return [
        val => (this.$v.user.fields.repPassword.required) || 'El campo Repetir Contraseña es requerido.'
      ]
    },
    birthdateRules (val) {
      return [
        val => (this.$v.user.fields.birthdate.required) || 'El campo Fecha de nacimiento es requerido.'
      ]
    },
    genderRules (val) {
      return [
        val => (this.$v.user.fields.gender.required) || 'El campo Genero es requerido.'
      ]
    },
    countryRules (val) {
      return [
        val => (this.$v.user.fields.country.required) || 'El campo País es requerido.'
      ]
    }
  },
  methods: {
    updateUser () {
      // Este metodo actualizara los datos del usuario
      const data = this.user.fields
      console.log(data)
      api.post(`http://localhost/Bonjour/back/public/UsersController/updateUser/${data.id}`, data).then(({ data }) => {
        console.log(data)
      })
    },
    fileValidation (arch) {
      if (arch != null) {
        var filePath = arch // fileInput.value
        var allowedExtensions1 = /(.jpg)$/i
        var allowedExtensions2 = /(.png)$/i
        var allowedExtensions3 = /(.jpeg)$/i
        var allowedExtensions4 = /(.pdf)$/i
        var allowedExtensions5 = /(.docx)$/i
        if (allowedExtensions1.exec(filePath)) {
          return 'jpg'
        }
        if (allowedExtensions2.exec(filePath)) {
          return 'png'
        }
        if (allowedExtensions3.exec(filePath)) {
          return 'jpeg'
        }
        if (allowedExtensions3.exec(filePath)) {
          return 'jpeg'
        }
        if (allowedExtensions4.exec(filePath)) {
          return 'pdf'
        }
        if (allowedExtensions5.exec(filePath)) {
          return 'docx'
        }
      }
    },
    changePP () {
      // if (this.user.fields.product_img === null) {
      this.$refs.photoProductRef.click()
      this.fetchFromServer()
      // } else {
      //   this.$q.dialog({
      //     title: 'Confirmar',
      //     message: '¿Cambiar foto del producto?',
      //     persistent: true,
      //     ok: {
      //       color: 'green',
      //       label: 'Si'
      //     },
      //     cancel: {
      //       color: 'red',
      //       label: 'No'
      //     }
      //   }).onOk(() => {
      //     this.$refs.photoProductRef.click()
      //   }).onCancel(() => {})
      // }
    },
    uploadPhoto () {
      if (this.$refs.photoProductRef.files[0]) {
        var formData = new FormData()
        formData.append('id', this.$store.getters['users/id'])
        formData.append('imagen', this.$refs.photoProductRef.files[0], 'perfil_' + this.$store.getters['users/id'] + '.' + this.fileValidation(this.$refs.photoProductRef.files[0].name))
        api.file('http://localhost/Bonjour/back/public/UsersController/uploadPhoto', formData).then(({ data }) => {
          console.log(data)
          // if (data.result) {
          //   this.$q.notify({
          //     position: 'top',
          //     title: data.message.title,
          //     message: data.message.content,
          //     persistent: true,
          //     label: 'OK',
          //     color: 'positive',
          //     actions: [{ icon: 'thumb_up', color: 'white' }]
          //   })
          //   this.reload()
          // } else {
          //   this.$q.notify({
          //     position: 'top',
          //     title: data.message.title,
          //     message: data.message.content,
          //     persistent: true,
          //     label: 'OK',
          //     color: 'negative',
          //     actions: [{ icon: 'close', color: 'white' }]
          //   })
          // }
        })
      }
    },
    changeModal (type) {
      this.options.photo = false
      switch (type) {
        case 1:
          this.options.profile = true
          break
        case 2:
          this.options.profile = false
          this.options.photo = true
          break
        default:
          break
      }
    },
    sex (type) {
      switch (type) {
        case 1:
          this.avatar = 'man.png'
          break
        case 2:
          this.avatar = 'woman.png'
          break
        case 3:
          this.avatar = 'gay.png'
          break
      }
    },
    fetchFromServer () {
      const id = Number(this.$store.getters['users/id'])
      api.get(`http://localhost/Bonjour/back/public/UsersController/getUser/${id}`).then(({ data }) => {
        this.user.fields = data
        this.user.fields.password = ''
        console.log(data)
      })
    },
    formatDate (date) {
      if (date !== null) {
        var info = date.split('/').reverse().join('-')
      }
      return info
    },
    formData (obj) {
      var formData = new FormData()
      for (var key in obj) {
        formData.append(key, obj[key])
      }
      return formData
    }
  }
}
</script>
