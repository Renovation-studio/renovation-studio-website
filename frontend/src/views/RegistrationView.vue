<template> 
  <AppLayout>
    <template #header>
      <AppHeader />
    </template>
    <template #main>
      <RegisterForm />
    </template>
    <template #footer>
      <AppFooter />
    </template>
  </AppLayout>
</template>

<script lang="ts" setup>
import AppLayout from "@/components/AppLayout.vue";
import AppFooter from "@/components/AppFooter.vue";
import AppHeader from "@/components/AppHeader.vue";
import RegisterForm from '@/components/AppRegister.vue';
</script>