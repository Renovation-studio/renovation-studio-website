<template>
  <AppLayout>
    <template #header>
      <AppHeader />
    </template>
    <template #main>
      <AppSignInForm />
    </template>
    <template #footer>
      <AppFooter />
    </template>
  </AppLayout>
</template>

<script lang="ts">
import AppSignInForm from '@/components/AppSignInForm.vue'
import AppLayout from "@/components/AppLayout.vue";
import AppFooter from "@/components/AppFooter.vue";
import AppHeader from "@/components/AppHeader.vue";

export default {
  components: {
    AppHeader, AppFooter, AppLayout,
    AppSignInForm
  }
}
</script>
