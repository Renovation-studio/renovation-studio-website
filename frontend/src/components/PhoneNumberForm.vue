<template>
  <div class="flex flex-col items-center max-w-[300px] m-auto">
    <input
      type="tel"
      v-model="phoneNumber"
      placeholder="Номер телефона"
      class="text-center border-none appearance-none rounded-full w-full px-4 py-3 pr-10 focus:outline-none focus:ring focus:border-blue-300 text-lg font-bold shadow-lg hover:shadow-xl focus:shadow-xl mb-4"
    />
    <button
      @click="submitPhoneNumber"
      class="font-bold cursor-pointer text-black px-6 py-3 rounded-lg border-none shadow-md hover:bg-gray-200 transition duration-300 w-8/12 mt-4"
    >
      Оставить заявку
    </button>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";

export default defineComponent({
  name: "PhoneNumberForm",
  setup() {
    const phoneNumber = ref("");

    function submitPhoneNumber() {
      phoneNumber.value = "";
    }

    return {
      phoneNumber,
      submitPhoneNumber,
    };
  },
});
</script>

<style scoped></style>
