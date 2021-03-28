import api from '../commons/api.js'

export default {
  namespaced: true,
  state: {
    id: null,
    nickname: null,
    roles: null,
    wasLoaded: false
  },
  mutations: {
    setId (state, id) {
      state.id = id
    },
    setNickname (state, nickname) {
      state.nickname = nickname
    },
    setRoles (state, roles) {
      state.roles = roles
    },
    setWasLoaded (state, wasLoaded) {
      state.wasLoaded = wasLoaded
    }
  },
  actions: {
    getProfile: async (context) => {
      var response = await api.get('users/profile')
      if (response.data.result) {
        context.commit('setId', response.data.user.id)
        context.commit('setNickname', response.data.user.nickname)
        context.commit('setRoles', response.data.user.roles)
        context.commit('setWasLoaded', true)
      }
      return response
    }
  },
  getters: {
    id: state => state.id,
    nickname: state => state.nickname,
    roles: state => state.roles,
    wasLoaded: state => state.wasLoaded
  }
}
