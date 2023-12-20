import { createRouter, createWebHistory } from 'vue-router'
import AboutView from '@/views/AboutView.vue'
import SignInView from "@/views/SignInView.vue";
import ForgotPasswordView from "@/views/ForgotPasswordView.vue";
import InWork from "@/views/InWork.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: InWork
    },
    {
      path: '/catalog',
      name: 'catalog',
      component: InWork
    },
    {
      path: '/registration',
      name: 'registration',
      component: InWork
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
      path: '/forgot-password',
      name: 'forgot-spassword',
      component: ForgotPasswordView
    }
  ]
})

export default router
