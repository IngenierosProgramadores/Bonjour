import api from '../commons/api.js'

export default {
  namespaced: true,
  state: {
    id: null,
    nickname: null,
    email: null,
    wasLoaded: false
  },
  mutations: {
    setId (state, id) {
      state.id = id
    },
    setNickname (state, nickname) {
      state.nickname = nickname
    },
    setEmail (state, email) {
      state.email = email
    },
    setWasLoaded (state, wasLoaded) {
      state.wasLoaded = wasLoaded
    }
  },
  actions: {
    getProfile: async (context) => {
      var response = await api.get('http://localhost/CIQuasar/back/public/UsersController/profile')
      if (response.data.result) {
        context.commit('setId', response.data.user.id)
        context.commit('setNickname', response.data.user.name)
        context.commit('setEmail', response.data.user.email)
        context.commit('setWasLoaded', true)
      }
      return response
    }
  },
  getters: {
    id: state => state.id,
    nickname: state => state.nickname,
    email: state => state.email,
    wasLoaded: state => state.wasLoaded
  }
}
