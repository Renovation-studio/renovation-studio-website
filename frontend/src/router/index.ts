import { createRouter, createWebHistory } from 'vue-router'
import Landing from '../views/Landing.vue'
import Plug from '../views/Plug.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'landing',
      component: Landing
    },
    {
      path: '/login',
      name: 'login',
      component: Plug
    },
    {
      path: '/catalog',
      name: 'catalog',
      component: Plug
    },
    {
      path: '/info',
      name: 'info',
      component: Plug
    },
  ]
})

router.beforeEach((to, from, next) => {
  window.scrollTo(0, 0);
  next();
});

export default router
