
import Login from 'pages/Login'
import MainLayout from 'layouts/MainLayout'
import Register from 'pages/Register'
import NuestrosCursos from 'pages/cursos/NuestrosCursos'
import ListaCursos from '../pages/cursos/listacursos/ListaCursos'
import InformacionCursos from '../pages/cursos/info/InformacionCursos'
const routes = [
  {
    path: '/Login',
    component: Login
  },
  {
    path: '/Register',
    component: Register
  },
  {
    path: '/',
    component: MainLayout,
    children: [
      { path: '', component: () => import('pages/Index.vue') },
      { path: 'Profile', component: () => import('pages/users/Profile.vue') },
      { path: 'NuestrosCursos', component: () => import('pages/cursos/NuestrosCursos') },
      { path: 'ListaCursos', component: () => import('pages/cursos/listacursos/ListaCursos') },
      { path: 'InformacionCursos', component: () => import('pages/cursos/info/InformacionCursos') }
    ]
  },
  {
    path: '/NuestrosCursos',
    component: NuestrosCursos
  },
  {
    path: '/ListaCursos',
    component: ListaCursos
  },
  {
    path: '/InformacionCursos',
    component: InformacionCursos
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
