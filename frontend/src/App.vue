<template>
  <MainHeader :is-user-registered="isRegistered" @phone-submit-success="showNotification"></MainHeader>
<!--  <CataloguePage v-if="isRegistered"></CataloguePage>-->
<!--  <Register v-else @register-success="handleRegistrationSuccess"></Register>-->
  <router-view></router-view>
  <MainFooter></MainFooter>
</template>

<script lang="ts">
import CataloguePage from "./components/CataloguePage.vue";

import MainHeader from "./components/MainHeader.vue";
import MainFooter from "./components/MainFooter.vue";
import Register from "./views/Register.vue";
export default {
  components: {
    CataloguePage,
    MainHeader,
    MainFooter,
    Register,
  },
  data() {
    return {
      isRegistered: false,
    };
  },
  created() {
    this.isRegistered = sessionStorage.getItem("isRegistered") === "true";
  },
  methods: {
    handleRegistrationSuccess() {
      this.isRegistered = true;
      sessionStorage.setItem("isRegistered", "true");
    },
  },
};
</script>

<style>


</style>
