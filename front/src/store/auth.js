import axios from 'axios'
import qs from 'qs'
import jwt from '../commons/jwt.js'

const module = {
  state: {},
  mutations: {
    setToken: (state, payload) => {
      state.token = payload
    }
  },
  actions: {
    logIn: ({ commit, dispatch }, payload) => {
      return axios.post('auth/login', qs.stringify(payload))
        .then(response => {
          if (response.data.result) {
            jwt.setToken(response.data.token)
            commit('setToken', response.data.token)
            axios.defaults.headers.common.Authorization = `Bearer ${jwt.checkToken()}`
          }
          return response
        })
        .catch(error => error)
    },
    logOut: (payload) => {
      jwt.destroyToken()
    },
    tokenExists: ({ commit }) => {
      const token = jwt.checkToken()
      if (token && token !== null) {
        commit('setToken', token)
        axios.defaults.headers.common.Authorization = `Bearer ${token}`
        return { result: true }
      }
      return { result: false }
    }
  },
  getters: {
    token: state => state.token
  }
}

export default module
