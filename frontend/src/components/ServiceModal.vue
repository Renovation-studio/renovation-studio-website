<template>
  <div
    v-if="show"
    class="modal fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-items-center z-50"
    @click.self="closeModal"
  >
    <div
      class="bg-[#8dd3bb] p-5 flex flex-col relative mx-auto border-none w-6/12 max-w-3xl items-start items-center"
    >
      <button
        class="absolute top-4 right-4 cursor-pointer bg-transparent border-none text-2xl"
        @click="closeModal"
      >
        X
      </button>
      <h2 class="text-4xl font-semibold mb-4 self-start">{{ service.name }}</h2>
      <div
        class="flex flex-row pt-5 border-t-3 border-b-0 border-x-0 border-solid"
      >
        <img
          :src="service.imageUrl"
          :alt="service.name"
          class="object-cover mb-5 w-6/12 aspect-square object-cover max-w-full"
        />
        <ul
          class="list-none ml-4 p-0 font-bold text-left text-2xl text-gray-700"
        >
          <li
            v-for="detail in service.details"
            :key="detail"
            class="mb-2 bg-transparent"
          >
            - {{ detail }}
          </li>
        </ul>
      </div>
      <div
        class="price-line border-dashed pt-4 mt-4 w-full flex justify-between border-t-2 border-slate-700 mt-1 pt-1 border-b-0 border-x-0 text-left"
      >
        <p class="text-2xl font-bold">Стоимость услуги</p>
        <p class="text-2xl font-bold pb-0">{{ formatPrice(service.price) }}</p>
      </div>
      <PhoneNumberForm></PhoneNumberForm>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import type { PropType } from "vue";
import PhoneNumberForm from "./PhoneNumberForm.vue";

interface ServiceDetails {
  imageUrl: string;
  name: string;
  price: string;
  details: string[];
}

export default defineComponent({
  name: "ServiceModal",
  components: {
    PhoneNumberForm,
  },
  props: {
    service: {
      type: Object as PropType<ServiceDetails> | null,
      required: true,
    },
    show: {
      type: Boolean,
      default: false,
    },
  },
  emits: ["close"],
  methods: {
    closeModal() {
      this.$emit("close");
    },
    formatPrice(price: string) {
      return price.replace("Р", "₽").replace(/м2/g, "m²");
    },
  },
});
</script>

<style scoped></style>
