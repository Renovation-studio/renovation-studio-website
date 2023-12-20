<template>
  <AppLayout>
    <template #header>
      <AppHeader />
    </template>
    <template #main>
      <AppForgetPasswordForm />
    </template>
    <template #footer>
      <AppFooter />
    </template>
  </AppLayout>
</template>

<script lang="ts">
import AppForgetPasswordForm from '@/components/AppForgetPasswordForm.vue'
import AppLayout from "@/components/AppLayout.vue";
import AppFooter from "@/components/AppFooter.vue";
import AppHeader from "@/components/AppHeader.vue";
export default {
  components: {
    AppHeader, AppFooter, AppLayout, AppForgetPasswordForm
  }
}
</script>
