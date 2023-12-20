import { createRouter, createWebHistory } from 'vue-router'
// import Login from '@/views/HomeView.vue'
import CataloguePage from '@/components/CataloguePage.vue'
import Register from '@/views/Register.vue'
// import HomeView from '@/views/Main.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: CataloguePage
    },
    // {
    //   path: '/Login',
    //   name: 'home',
    //   component: Login
    // },
    {
      path: '/register',
      name: 'register',
      component: Register
    }
  ]
})

export default router
