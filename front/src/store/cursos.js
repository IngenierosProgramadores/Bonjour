
const state = {
  cursos: [
    { id: 1, nombre: 'Nivel 1', descripcion: 'En este curso aprenderas los verbos', urll: require('../assets/imagenes/cursos/clase1.jpg') },
    { id: 2, nombre: 'Nivel 2', descripcion: 'En este curso aprenderas vocabulario', urll: require('../assets/imagenes/cursos/clase2.jpg') },
    { id: 3, nombre: 'Nivel 3', descripcion: 'En este curso aprenderas frases', urll: require('../assets/imagenes/cursos/clase3.jpg') },
    { id: 4, nombre: 'Nivel 4', descripcion: 'En este curso aprenderas phrasal verbs', urll: require('../assets/imagenes/cursos/clase4.jpg') }
  ],
  listaCursos: [
    { id: 1, nombre: 'Nivel 1', nivel: '1', descripcion: 'Verbo To be', urll: require('../assets/imagenes/cursos/clase1.jpg') },
    { id: 2, nombre: 'Nivel 1', nivel: '1', descripcion: 'Vocabulario', urll: require('../assets/imagenes/cursos/clase2.jpg') },
    { id: 3, nombre: 'Nivel 1', nivel: '1', descripcion: 'El uso diario de las frases', urll: require('../assets/imagenes/cursos/clase3.jpg') },
    { id: 4, nombre: 'Nivel 1', nivel: '1', descripcion: 'Frases Verbales', urll: require('../assets/imagenes/cursos/clase4.jpg') },
    { id: 5, nombre: 'Nivel 2', nivel: '2', descripcion: 'Vocabulario', urll: require('../assets/imagenes/cursos/clase1.jpg') },
    { id: 6, nombre: 'Nivel 2', nivel: '2', descripcion: 'Vocabulario', urll: require('../assets/imagenes/cursos/clase2.jpg') },
    { id: 7, nombre: 'Nivel 2', nivel: '2', descripcion: 'Vocabulario', urll: require('../assets/imagenes/cursos/clase3.jpg') },
    { id: 8, nombre: 'Nivel 2', nivel: '2', descripcion: 'Vocabulario', urll: require('../assets/imagenes/cursos/clase4.jpg') },
    { id: 9, nombre: 'Nivel 3', nivel: '3', descripcion: 'Frases', urll: require('../assets/imagenes/cursos/clase1.jpg') },
    { id: 10, nombre: 'Nivel 3', nivel: '3', descripcion: 'Frases', urll: require('../assets/imagenes/cursos/clase2.jpg') },
    { id: 11, nombre: 'Nivel 3', nivel: '3', descripcion: 'Frases', urll: require('../assets/imagenes/cursos/clase3.jpg') },
    { id: 12, nombre: 'Nivel 3', nivel: '3', descripcion: 'Frases', urll: require('../assets/imagenes/cursos/clase4.jpg') },
    { id: 13, nombre: 'Nivel 3', nivel: '3', descripcion: 'Frases', urll: require('../assets/imagenes/cursos/clase3.jpg') },
    { id: 14, nombre: 'Nivel 3', nivel: '3', descripcion: 'Frases', urll: require('../assets/imagenes/cursos/clase4.jpg') }
  ],
  cursoElegido: 0
}

const getters = {
  getCursos (state) {
    return state.cursos
  },
  getListCursos (state) {
    return state.listaCursos.filter((buscar) => buscar.nivel.includes('' + state.cursoElegido))
  }
}

const mutations = {
  setcursoElegido (state, id) {
    console.log(id)
    state.cursoElegido = id
  }
}

const actions = {
  async goCurso ({ commit }, id) {
    console.log('' + id)
    commit('setcursoElegido', id)
    // console.log(state.cursoElegido)
  }
}

export default {
  namespace: true,
  state,
  getters,
  mutations,
  actions
}
