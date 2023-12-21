<template>
  <AppLayout>
    <template #header>
      <AppHeader />
    </template>
    <template #main>
      <Catalogue />
    </template>
    <template #footer>
      <AppFooter />
    </template>
  </AppLayout>
</template>

<script lang="ts" setup>
import Catalogue from '@/components/AppCatalogue.vue'
import AppLayout from "@/components/AppLayout.vue";
import AppFooter from "@/components/AppFooter.vue";
import AppHeader from "@/components/AppHeader.vue";
</script>
