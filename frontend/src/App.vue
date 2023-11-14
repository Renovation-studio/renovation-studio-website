
<template>
  <AppLayout>
    <template #header>
      <AppHeader />
    </template>
    <template #main>
      <RouterView />
    </template>
    <template #footer>
      <AppFooter />
    </template>
  </AppLayout>
</template>

<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue'
import AppFooter from '@/components/AppFooter.vue'
import AppLayout from "@/components/AppLayout.vue";
</script>

