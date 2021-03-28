<template>
  <q-layout>
    <q-header elevated style="background: #5404a4">
      <q-toolbar>
        <q-breadcrumbs align="left" style="font-size: 20px">
          <q-breadcrumbs-el label="" icon="arrow_back" to="/Login" class="text-white" />
          <q-breadcrumbs-el label="Registro" />
        </q-breadcrumbs>
      </q-toolbar>
    </q-header>
    <q-page-container style="background-color: #F0F0F0F0;">
      <q-page>
        <div class="q-pa-md">
          <div class="row justify-center">
            <div class="col-md-6 q-pa-md" style="padding-bottom:">
              <img src="../assets/Recurso4.png" alt="Iniciar Sesión" width="100%" >
            </div>
          </div>
          <div class="row justify-center">
            <div class="col-md-6 q-pa-md">
              <div class="row ">
                <div class="col-sm-1 offset-11 pull-right">
                  <q-btn label="Nuevo" style="visibility: hidden;" />
                </div>
              </div>

              <div class="row q-col-gutter-sm">
                <div class="col-xs-12 col-sm-6">
                  <q-input
                    name="name"
                    color="accent"
                    bg-color="white"
                    filled
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
                    filled
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
                    filled
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
                <div class="col-xs-12 col-sm-6 text-center">
                    <q-select
                    color="accent"
                    bg-color="white"
                    filled
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
                    filled
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
                  <q-input
                    color="accent"
                    bg-color="white"
                    filled
                    label-color="accent"
                    :rules="repPasswordRules"
                    v-model="user.fields.repPassword"
                    label="Repetir Contraseña"
                    :type="isPwdR ? 'password' : 'text'"
                  >
                    <template v-slot:prepend>
                      <q-icon name="fas fa-key" color="accent" />
                    </template>
                    <template v-slot:append>
                      <q-icon
                        :name="isPwdR ? 'visibility_off' : 'visibility'"
                        class="cursor-pointer"
                        color="accent"
                        @click="isPwdR = !isPwdR"
                      />
                    </template>
                  </q-input>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <q-select
                    color="accent"
                    bg-color="white"
                    filled
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
                    filled
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
                    filled
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
                <div class="col-xs-12 col-sm-6" style="padding-bottom: 0px">
                  <q-btn  color="positive" style="float: right; margin-top:12px; background: #5404a4 " icon="how_to_reg" label="Registrarte" @click="createUser()" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script>
const { required, maxLength, email } = require('vuelidate/lib/validators')
// import axios from 'axios'
import api from '../commons/api'
export default {
  name: 'register',
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
  },
  data () {
    return {
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
          phone: null
        }
      },
      genders: ['MASCULINO', 'FEMENINO', 'PERSONALIZADO'],
      isPwd: true,
      isPwdR: true,
      url: 'http://localhost/CIQuasar/back/'
    }
  },
  beforeCreate () {
    // if (!this.$store.getters['users/roles'].includes(1)) {
    //   this.$router.push('/')
    // }
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
    },
    createUser () {
      this.$v.user.fields.$reset()
      this.$v.user.fields.$touch()
      if (this.$v.user.fields.$error) {
        this.$q.dialog({
          title: 'Error',
          message: 'Por favor, verifique las validaciones.',
          persistent: true
        })
        return false
      }
      this.user.fields.birthdate = this.formatDate(this.user.fields.birthdate)
      var formData = this.user.fields
      api.post(this.url + 'user/addUser', formData).then(({ data }) => {
        console.log(data)
        this.$q.notify({
          message: data.msg,
          position: 'top',
          color: (data.msg ? 'positive' : 'warning')
        })
        if (data.error) {
          this.$q.loading.hide()
          this.$router.push('/Login')
        } else {
          this.$q.loading.hide()
        }
      })
    }
  }
}
</script>

<style>
</style>
