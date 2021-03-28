<template>
  <q-layout> <!--view="lHh Lpr lFf"-->
    <q-header elevated>
      <q-toolbar>
        <q-toolbar-title>
          Bonjour Vallarta
        </q-toolbar-title>
      <!-- <q-btn stretch flat label="" icon="notifications" /> -->
      <q-btn-dropdown auto-close color="white" label="" flat  dropdown-icon="notifications" no-icon-animation v-model="menuNoti" @mouseover.native="menuNotiOver = true" @mouseout.native="menuNotiOver = false">
        <q-list highlight separator @mouseover.native="listNotiOver = true" @mouseout.native="listNotiOver = false">
          <q-item  v-for="(value,key) in data" highlight separator  v-bind:key="key">
            <q-item-section>
              <q-item-label >{{ value.name + ' ' + value.apellido}}</q-item-label>
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
          <q-item clickable>
            <q-item-section avatar>
              <q-avatar color="orange" text-color="white">E</q-avatar>
            </q-item-section>
            <q-item-section>
              <q-item-label>Edgar Meneses</q-item-label>
              <q-item-label caption> menesesedgar1999@gmail.com</q-item-label>
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
              <q-item-label>Cerrar Sesión</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </q-btn-dropdown>
      </q-toolbar>
    </q-header>
  </q-layout>
</template>

<script>
import { debounce } from 'quasar'
import axios from 'axios'

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
      data: []
    }
  },
  mounted () {
    this.fetchFromServer()
  },
  methods: {
    // https://randomuser.me/api/?results=500
    fetchFromServer () {
      axios.get('http://localhost/bonjour/php/api.php?evento=mostrar').then(data => {
        console.log(data)
        this.data = data.data.alumnos
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
