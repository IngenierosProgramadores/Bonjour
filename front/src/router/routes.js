
import Login from 'pages/Login'
import MainLayout from 'layouts/MainLayout'
import Register from 'pages/Register'
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
      { path: 'Profile', component: () => import('pages/users/Profile.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
