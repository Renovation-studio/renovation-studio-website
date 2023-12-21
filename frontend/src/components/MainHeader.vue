<template>
  <div>
    <header class="bg-white border-b-2 border-gray-200 py-8">
      <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center">
          <img src="../assets/logo.png" alt="Logo" class="h-12 w-auto" />
          <CitySelector class="ml-8"></CitySelector>
        </div>

        <!-- <div class="cursor-pointer bg-white text-black px-6 py-3 rounded-lg border-solid border-1 border-black shadow-md hover:bg-gray-200 transition duration-300">
          Войти
        </div> -->
      </div>
    </header>

    <nav class="bg-[#8dd3bb] text-black py-6">
      <div class="container mx-auto flex justify-evenly">
        <div class="space-x-50">
          <span
            class="no-underline font-bold cursor-pointer hover:text-gray-500"
            ><a
              class="text-sm text-bold font-montserrat inline-block py-2 px-4 no-underline nav-item"
              href="#"
          ><router-link to="/PageNotFound">Портфолио</router-link></a></span
          >
          <span
            class="no-underline font-bold cursor-pointer hover:text-gray-500"
            ><a
              class="text-sm text-bold font-montserrat inline-block py-2 px-4 no-underline nav-item"
              href="#"
          ><router-link to="/PageNotFound">Цены</router-link></a></span
          >
          <span
            class="no-underline font-bold cursor-pointer hover:text-gray-500"
            ><a
              class="text-sm text-bold font-montserrat inline-block py-2 px-4 no-underline nav-item"
              href="#"
          ><router-link to="/PageNotFound">Отзывы</router-link></a></span
          >
          <span
            class="no-underline font-bold cursor-pointer hover:text-gray-500"
            ><a
              class="text-sm text-bold font-montserrat inline-block py-2 px-4 no-underline nav-item"
              href="#"
          ><router-link to="/PageNotFound">О нас</router-link></a></span
          >
          <span
        class="font-bold cursor-pointer text-black px-6 py-3 rounded-lg border-solid border-1 border-black shadow-md hover:bg-gray-200 transition duration-300"
        @click="isModalOpen = true"
      >
        Заказать ремонт
      </span>
        </div>
      </div>
    </nav>
    <GenericModal v-model="isModalOpen">
    <template v-if="isUserRegistered">
      <PhoneNumberForm @submit="handlePhoneSubmitSuccess"></PhoneNumberForm>
    </template>
    <template v-else>
      <p class="text-2xl font-bold text-center">Необходимо зайти в аккаунт</p>
    </template>
  </GenericModal>
  </div>
</template>

<script lang="ts">
import CitySelector from './CitySelector.vue';
import GenericModal from './GenericModal.vue';
import PhoneNumberForm from './PhoneNumberForm.vue';

export default {
  components: {
    CitySelector,
    GenericModal,
    PhoneNumberForm,
  },
  data() {
    return {
      isModalOpen: false,
    };
  },
  props: {
    isUserRegistered: {
      type: Boolean,
      required: true
    }
  },
  methods: {
    handlePhoneSubmitSuccess() {
      this.isModalOpen = false;
      this.$emit('phone-submit-success');
    },
  },
};
</script>

<style>
a {
  font-weight: 500;
  color: black;
  text-decoration: inherit;
  transition: 0.3s;
}
a:hover {
  color: #292f2e;
  transition: 0.3s;
}


</style>