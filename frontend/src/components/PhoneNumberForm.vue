<template>
  <div class="flex flex-col items-center max-w-[300px] m-auto relative">
    <input
      type="tel"
      v-model="formattedPhoneNumber"
      :class="{ 'invalid-input': isInvalid }"
      @input="formatInput"
      maxlength="15"
      placeholder="Номер телефона"
      class="phone-input text-center border-none appearance-none rounded-full w-full px-4 py-3 focus:outline-none focus:ring focus:border-blue-300 text-lg font-bold shadow-lg hover:shadow-xl focus:shadow-xl mb-4 transition-colors"
    />
    <div v-if="isInvalid" class="exclamation-mark"></div>
    <div v-if="isInvalid" class="tooltip text-center border-none appearance-none rounded-2xl w-8/12 py-3 text-lg shadow-lg mb-4 bg-[#ffbcbc]">
      Неверный формат
    </div>
    <button
      @click="submitPhoneNumber"
      class="font-bold cursor-pointer text-black px-6 py-3 rounded-lg border-none shadow-md hover:bg-gray-200 transition duration-300 w-8/12 mt-4"
    >
      Оставить заявку
    </button>
  </div>
</template>


<script lang="ts">
import { defineComponent, ref, watch } from "vue";

export default defineComponent({
  name: "PhoneNumberForm",
  setup() {
    const phoneNumber = ref("");
    const formattedPhoneNumber = ref("");
    const isInvalid = ref(false);
    const phoneRegex = /^(?:7|8)?9\d{9}$/;

    function formatPhoneNumber(value) {
      const numbers = value.replace(/\D/g, '');
      const char = { 1: ' ', 4: ' ', 7: ' ', 9: ' ' };
      let phoneNumber = '';
      for (let i = 0; i < numbers.length; i++) {
        phoneNumber += (char[i] || '') + numbers[i];
      }
      return phoneNumber;
    }

    function formatInput(event) {
      const input = event.target.value;
      formattedPhoneNumber.value = formatPhoneNumber(input);
      phoneNumber.value = input.replace(/\D/g, '');
      validatePhoneNumber();
    }

    function validatePhoneNumber() {
      isInvalid.value = phoneNumber.value.length > 0 && !phoneRegex.test(phoneNumber.value);
    }

    function submitPhoneNumber() {
      if (!isInvalid.value && phoneNumber.value) {
        console.log("Phone number submitted:", phoneNumber.value);
        phoneNumber.value = "";
        formattedPhoneNumber.value = "";
      }
    }

    return {
      formattedPhoneNumber,
      submitPhoneNumber,
      formatInput,
      isInvalid
    };
  },
});
</script>


<style scoped>
.bg-red-500 {
  background-color: #f87171;
}
/* ffbcbc */
.phone-input {
  background-position: right 10px center;
  background-repeat: no-repeat;
  background-size: 20px;
  position: relative;
}

.invalid-input {
  background-color: #ffbcbc;
}

.relative {
  position: relative;
}

.exclamation-mark {
  position: absolute;
  top: 20%;
  right: 10px;
  transform: translateY(-50%);
  width: 20px;
  height: 20px;
  background-image: url('../assets/exclamation-mark.svg');
  background-size: contain;
  background-repeat: no-repeat;
}

.tooltip {
  position: absolute;
  bottom: 100%;
  left: 100%;
  transform: translateX(-50%);
  display: none;
}

.exclamation-mark:hover + .tooltip {
  display: block;
}

</style>
