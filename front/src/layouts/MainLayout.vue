<template>
  <q-layout view="hHh lpR fFf"> <!--view="lHh Lpr lFf"-->
    <q-header elevated style="background-color: rgba(0, 0, 0, .3)">
      <q-toolbar>
        <!-- <q-toolbar-title>
          Bonjour Vallarta
        </q-toolbar-title> -->
      <!-- <q-btn stretch flat label="" icon="notifications" /> -->
      <div class="col-md-1"></div>
      <div class="col-sm-5">
        <div class="my-font text-h6">
          <label for="" class="q-pr-xl" @click="nuestrosCursos()">Nuestros Cursos</label>
          <label for="" class="q-pr-xl">Nosotros</label>
          <label for="" class="q-pr-xl">Contacto</label>
        </div>
      </div>
      <div class="q-pa-xs">
        <img src="../assets/header.png" height="50px" @click="main()">
      </div>
      <q-toolbar-title></q-toolbar-title>
      <div class="gt-sm">
        <q-btn-dropdown  class="" auto-close color="white" label="" flat  dropdown-icon="fas fa-shopping-cart" no-icon-animation v-model="menuCart" @mouseover.native="menuCartOver = true" @mouseout.native="menuCartOver = false">
          <q-list highlight separator @mouseover.native="listCartOver = true" @mouseout.native="listCartOver = false">
            <q-item  v-for="(value,key) in data" highlight separator  v-bind:key="key">
              <q-item-section>
                <q-item-label >{{ value.name + ' ' + value.surname}}</q-item-label>
                <q-item-label caption lines="2">{{ value.email }}</q-item-label>
              </q-item-section>

              <q-item-section side top>
                <q-item-label caption>5 min ago</q-item-label>
                <q-icon name="star" color="yellow"></q-icon>
              </q-item-section>
            </q-item>
            <q-separator spaced inset></q-separator>
          </q-list>
        </q-btn-dropdown>
        <q-btn-dropdown auto-close color="white" label="" flat  dropdown-icon="notifications" no-icon-animation v-model="menuNoti" @mouseover.native="menuNotiOver = true" @mouseout.native="menuNotiOver = false">
          <q-list highlight separator @mouseover.native="listNotiOver = true" @mouseout.native="listNotiOver = false">
            <q-item  v-for="(value,key) in data" highlight separator  v-bind:key="key">
              <q-item-section>
                <q-item-label >{{ value.name + ' ' + value.surname}}</q-item-label>
                <q-item-label caption lines="2">{{ value.email }}</q-item-label>
              </q-item-section>

              <q-item-section side top>
                <q-item-label caption>5 min ago</q-item-label>
                <q-icon name="star" color="yellow"></q-icon>
              </q-item-section>
            </q-item>
            <q-separator spaced inset></q-separator>
          </q-list>
        </q-btn-dropdown>
        <q-btn-dropdown auto-close  stretch color="white" label="" flat dropdown-icon="account_circle" no-icon-animation v-model="menuUser" @mouseover.native="menuUserOver = true" @mouseout.native="menuUserOver = false">
          <q-list highlight separator @mouseover.native="listUserOver = true" @mouseout.native="listUserOver = false">
            <q-item clickable @click="profile()">
              <q-item-section avatar>
                <q-avatar color="orange" text-color="white">E</q-avatar>
              </q-item-section>
              <q-item-section >
                <q-item-label >{{ name }}</q-item-label>
                <q-item-label caption> {{ email }}</q-item-label>
              </q-item-section>
            </q-item>

            <q-item clickable>
              <q-item-section avatar>
                <q-avatar icon="folder" color="primary" text-color="white"></q-avatar>
              </q-item-section>
              <q-item-section>
                <q-item-label>Mis cursos</q-item-label>
              </q-item-section>
            </q-item>

            <q-item clickable>
              <q-item-section>
                <q-item-label @click.native="logOut()">Cerrar Sesión</q-item-label>
              </q-item-section>
            </q-item>
          </q-list>
        </q-btn-dropdown>
      </div>
      <div class="col-md-1"></div>
      <div class="lt-md">
        <q-btn
        flat
        round
        dense
        icon="menu"
        aria-label="Menu"
        @click ="leftDrawerOpen = !leftDrawerOpen">
        </q-btn>
      </div>
      </q-toolbar>
    </q-header>
    <div class="lt-md">
      <q-drawer
      v-model="leftDrawerOpen"
      bordered
      content-class="bg-grey-2"
      >
      <q-list>
        <q-item header></q-item>
        <q-item clickable tag="a" target="_blanck">
          <q-item-section avatar>
            <q-icon name="school"></q-icon>
          </q-item-section>
          <q-item-section>
            <q-item-label>Nuestros Cursos</q-item-label>
          </q-item-section>
        </q-item>
        <q-item clickable tag="a" target="_blanck">
          <q-item-section avatar>
            <q-icon name="school"></q-icon>
          </q-item-section>
          <q-item-section>
            <q-item-label>Nosotros</q-item-label>
          </q-item-section>
        </q-item>
        <q-item clickable tag="a" target="_blanck">
          <q-item-section avatar>
            <q-icon name="school"></q-icon>
          </q-item-section>
          <q-item-section>
            <q-item-label>Contacto</q-item-label>
          </q-item-section>
        </q-item>
      </q-list>
      </q-drawer>
    </div>
    <q-page-container style="background-color: white;">
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { debounce, openURL } from 'quasar'
import api from '../commons/api'
export default ({
  name: 'MainLayout',
  components: { },
  data () {
    return {
      leftDrawerOpen: false,
      menuUser: false,
      menuUserOver: false,
      listUserOver: false,
      menuNoti: false,
      menuNotiOver: false,
      listNotiOver: false,
      menuCart: false,
      menuCartOver: false,
      listCartOver: false,
      data: [],
      url: 'http://localhost/Bonjour/back/public/'
    }
  },
  created () {
  },
  mounted () {
    this.fetchFromServer()
  },
  computed: {
    name () {
      return this.$store.getters['users/nickname']
    },
    email () {
      return this.$store.getters['users/email']
    }
  },
  methods: {
    main () {
      this.$router.push('/')
    },
    openURL,
    profile () {
      console.log('Abrir perfil')
      this.$router.push('/Profile')
    },
    logOut () {
      localStorage.removeItem('JWT')
      window.location.reload()
    },
    nuestrosCursos () {
      this.$router.push('/NuestrosCursos')
    },
    fetchFromServer () {
      api.get(this.url + 'UsersController/getUsers').then(({ data }) => {
        this.data = data.users
      })
    },
    debounceFuncU: debounce(function () { this.checkMenuUser() }, 300),
    debounceFuncN: debounce(function () { this.checkMenuNoti() }, 300),
    debounceFuncC: debounce(function () { this.checkMenuCart() }, 300),
    onItemClick () {
      console.log('Clicked on an Item')
    },
    checkMenuUser () {
      if (this.menuUserOver || this.listUserOver) {
        this.menuUser = true
      } else {
        this.menuUser = false
      }
    },
    checkMenuNoti () {
      if (this.menuNotiOver || this.listNotiOver) {
        this.menuNoti = true
      } else {
        this.menuNoti = false
      }
    },
    checkMenuCart () {
      if (this.menuCartOver || this.listCartOver) {
        this.menuCart = true
      } else {
        this.menuCart = false
      }
    }
  },
  watch: {
    menuUserOver (val) {
      this.debounceFuncU()
    },
    listUserOver (val) {
      this.debounceFuncU()
    },
    menuNotiOver (val) {
      this.debounceFuncN()
    },
    listNotiOver (val) {
      this.debounceFuncN()
    },
    menuCartOver (val) {
      this.debounceFuncC()
    },
    listCartOver (val) {
      this.debounceFuncC()
    }
  }
})
</script>
<style lang="sass">
.my-font
    font-family: 'Roboto'
</style>
