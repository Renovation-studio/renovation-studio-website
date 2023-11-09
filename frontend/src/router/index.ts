import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import AboutView from '@/views/AboutView.vue'
import SignInView from "@/views/SignInView.vue";
import ForgotPasswordView from "@/views/ForgotPasswordView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView
    },
    {
      path: '/login',
      name: 'login',
      component: SignInView
    },
    {
      path: '/forgot_password',
      name: 'forgot_password',
      component: ForgotPasswordView
    }
  ]
})

export default router
