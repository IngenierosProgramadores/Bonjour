<template>
  <div id="q-app">
    <router-view />
  </div>
</template>
<script>
export default {
  name: 'App',
  data () {
    return {
      canRender: false
    }
  },
  created () {
    this.canRender = true
    this.$router.push('/Login')
  }
}
</script>
