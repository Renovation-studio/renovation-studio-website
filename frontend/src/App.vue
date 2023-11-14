
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

<script lang="ts">
import AppHeader from '../src/components/AppHeader.vue'
import AppFooter from '../src/components/AppFooter.vue'
import AppLayout from "@/components/AppLayout.vue";

export default {
  components:{
    AppLayout,
    AppHeader,
    AppFooter
  },
}
</script>

