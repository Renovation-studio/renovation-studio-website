import { createRouter, createWebHistory } from 'vue-router'
import { RouteNames } from './route-names';

import SignInView from "@/views/SignInView.vue";
import ForgotPasswordView from "@/views/ForgotPasswordView.vue";
import CatalogueView from '@/views/CatalogueView.vue'
import Register from '@/views/RegistrationView.vue'
import InWork from "@/views/InWork.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: RouteNames.Home,
      component: InWork
    },
    {
      path: '/landing',
      name: 'landing',
      component: InWork
    },
    {
      path: '/catalog',
      name: RouteNames.Catalog,
      component: CatalogueView
    },
    {
      path: '/registration',
      name: RouteNames.Registration,
      component: Register
    },
    {
      path: '/login',
      name: RouteNames.Login,
      component: SignInView
    },
    {
      path: '/forgot-password',
      name: RouteNames.ForgotPassword,
      component: ForgotPasswordView
    }
  ]
})

export default router
export { RouteNames }