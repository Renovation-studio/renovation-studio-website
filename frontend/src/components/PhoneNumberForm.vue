<template>
  <div class="flex flex-col items-center max-w-[300px] m-auto relative">
    <input
      v-model="formattedPhoneNumber"
      type="tel"
      :class="{ 'bg-[#ffbcbc]': isInvalid }"
      maxlength="15"
      placeholder="Номер телефона"
      class="phone-input text-center border-none appearance-none rounded-full w-full px-4 py-3 focus:outline-none focus:ring focus:border-blue-300 text-lg font-bold shadow-lg hover:shadow-xl focus:shadow-xl mb-4 transition-colors bg-no-repeat relative"
      @input="formatInput"
    />
    <div
      v-if="isInvalid"
      class="exclamation-mark absolute top-[20%] right-2.5 -translate-y-1/2 w-5 h-5 bg-contain bg-no-repeat"
    ></div>
    <div
      v-if="isInvalid"
      class="tooltip text-center border-none appearance-none rounded-2xl w-8/12 py-3 text-lg shadow-lg mb-4 bg-[#ffbcbc] absolute bottom-[100%] left-[100%] -translate-x-1/2"
    >
      Неверный формат
    </div>
    <button
      class="font-bold cursor-pointer text-black px-6 py-3 rounded-lg border-none shadow-md hover:bg-gray-200 transition duration-300 w-8/12 mt-4"
      @click="submitPhoneNumber"
    >
      Оставить заявку
    </button>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import { PhoneNumber } from '@/utils/phoneNumberUtils'

const phoneConfig = {
  regex: /^(?:7|8)?9\d{9}$/,
  formatting: { 1: ' ', 4: ' ', 7: ' ', 9: ' ' }
}

const phoneNumberProcessor = new PhoneNumber(phoneConfig)

export default defineComponent({
  name: 'PhoneNumberForm',
  emits: ['submit'],
  setup() {
    const phoneNumber = ref('')
    const formattedPhoneNumber = ref('')
    const isInvalid = ref(false)

    function formatInput(event) {
      const input = event.target.value
      const result = phoneNumberProcessor.processInput(input)
      formattedPhoneNumber.value = result.formatted
      isInvalid.value = !result.isValid
      phoneNumber.value = result.cleanNumber
    }

    function submitPhoneNumber() {
      if (!isInvalid.value && phoneNumber.value) {
        this.$emit('submit')
        phoneNumber.value = ''
        formattedPhoneNumber.value = ''
      }
    }

    return {
      formattedPhoneNumber,
      submitPhoneNumber,
      formatInput,
      isInvalid
    }
  }
})
</script>

<style scoped>
.phone-input {
  background-position: right 10px center;
  background-size: 20px;
}

.exclamation-mark {
  background-image: url('../assets/exclamation-mark.svg');
}

.tooltip {
  display: none;
}

.exclamation-mark:hover + .tooltip {
  display: block;
}
</style>
