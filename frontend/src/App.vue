<template>
  <MainHeader @phone-submit-success="showNotification"></MainHeader>
<!--  <CataloguePage></CataloguePage>-->
  <RouterView />
  <MainFooter></MainFooter>
</template>

<script lang="ts">
import CataloguePage from './components/CataloguePage.vue';

import MainHeader from './components/MainHeader.vue'
import MainFooter from './components/MainFooter.vue';
export default {
  components: {
    CataloguePage,
    MainHeader,
    MainFooter,
  },
};
</script>

<style>
</style>
