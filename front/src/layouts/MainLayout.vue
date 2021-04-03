<template>
  <q-layout view="hHh lpR fFf"> <!--view="lHh Lpr lFf"-->
    <q-header elevated style="background: #5404a4">
      <q-toolbar>
        <q-toolbar-title>
          Bonjour Vallarta
        </q-toolbar-title>
      <!-- <q-btn stretch flat label="" icon="notifications" /> -->
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
              <q-item-label @click="logOut()">Cerrar Sesión</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </q-btn-dropdown>
      </q-toolbar>
    </q-header>
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
      menuUser: false,
      menuUserOver: false,
      listUserOver: false,
      menuNoti: false,
      menuNotiOver: false,
      listNotiOver: false,
      data: [],
      url: 'http://localhost/CIQuasar/back/public/'
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
    openURL,
    profile () {
      console.log('Abrir perfil')
      this.$router.push('/Profile')
    },
    logOut () {
      localStorage.removeItem('JWT')
      window.location.reload()
    },
    fetchFromServer () {
      api.get(this.url + 'UsersController/getUsers').then(({ data }) => {
        this.data = data.users
      })
    },
    debounceFuncU: debounce(function () { this.checkMenuUser() }, 300),
    debounceFuncN: debounce(function () { this.checkMenuNoti() }, 300),
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
    }
  }
})
</script>
