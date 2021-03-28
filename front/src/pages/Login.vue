<template>
  <q-layout>
    <q-page-container style="background-color: #F0F0F0F0;">
      <q-page>
        <div class="row justify-center" style="padding-top: 6%;padding-bottom:2%">
          <img src="../assets/Recurso3.png" alt="Iniciar Sesión" width="350" @dblclick="magic">
        </div>
        <div class="row justify-center">
          <div class="col-sm-4 q-pa-md">
            <div class="row q-mb-sm">
            </div>
            <div class="row q-col-gutter-xs">
              <div class="col-xs-12 col-sm-12">
                <q-input
                  color="accent"
                  bg-color="white"
                  filled
                  label-color="accent"
                  name="email"
                  v-model="email"
                  label="Correo electrónico"
                  type="email"
                  v-on:keyup.enter="logIn()">
                <template v-slot:prepend>
                  <q-icon name="fas fa-at" color="accent"/>
                </template>
                </q-input>
              </div>
              <div class="col-xs-12 col-sm-12">
                <q-input
                  color="accent"
                  bg-color="white"
                  filled
                  label-color="accent"
                  name="password"
                  v-model="password"
                  label="Contraseña" :type="isPwd ? 'password' : 'text'"
                  v-on:keyup.enter="logIn()">
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
              <div class="col-xs-12 col-md-12" >
                <div class="q-pa-sm q-gutter-sm" >
                  <q-btn icon="login" color="primary"  style="float: right" label="Iniciar sesión" :loading="loading" @click="logIn()" />
                  <q-btn icon="how_to_reg" color="positive"   style="float: right" label="Registrarse" :loading="loading" @click="register()" />
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
import axios from 'axios'
import api from '../commons/api'
export default {
  name: 'Login',
  data () {
    return {
      email: null,
      password: null,
      isPwd: true,
      loading: false,
      url: 'http://localhost/CIQuasar/back/'
    }
  },
  // computed: {},
  // beforeCreate () {},
  created () {
    // const JWT = localStorage.getItem('JWT')
    // if (JWT !== null && JWT !== '') {
    //   this.$axios.defaults.headers.common.Authorization = `Bearer ${JWT}`

    //   this.$store.dispatch('users/getProfile').then(() => {
    //     const userWasLoaded = this.$store.getters['users/wasLoaded']
    //     if (userWasLoaded) {
    //       this.$router.push('/dashboard')
    //     } else {
    //       // Se queda en LOGIN
    //     }
    //   }).catch(error => {
    //     localStorage.removeItem('JWT')
    //     window.location.reload()
    //     console.error(error)
    //   })
    // } else {
    //   // Se queda en LOGIN
    // }
  },
  mounted () {
    api.get(this.url + 'user/showAll').then(({ data }) => {
      console.log(data)
    })
  },
  methods: {
    register () {
      this.$router.push('/Register/')
    },
    magic () {
      this.email = 'edgar@ant.com.mx'
      this.password = 'quetzalcore'
    },
    logIn () {
      const params = {
        email: this.email,
        password: this.password
      }
      console.log(params)
      this.loading = true
      axios.post(this.url + 'user/login', params).then(({ data }) => {
        this.loading = false
        console.log(data)
        if (data.result) {
          this.$router.push(data.result ? '/' : '/login')
        } else {
          this.$q.notify({
            position: 'top',
            classes: 'letras',
            timeout: 1000,
            message: data.message,
            color: 'warning',
            icon: 'close'
          })
        }
      }).catch(error => {
        this.loading = false
        console.log(error)
      })
    },
    nope () {
      // NOPE
    }
  }
}
</script>

<style>
.letras {
  font-size:  20px;
}
</style>
