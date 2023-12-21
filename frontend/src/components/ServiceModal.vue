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
      <h2 class="text-4xl font-semibold mb-4 self-start">
        {{ service.title }}
      </h2>
      <div class="flex flex-row pt-5 border-t-3 border-b-0 border-x-0 border-solid">
        <img
          :src="`assets/${service.img}`"
          :alt="service.title"
          class="object-cover mb-5 w-6/12 aspect-square object-cover max-w-full"
        />
        <div
          v-if="isLoading"
          class="flex justify-center items-center w-full"
        >
          <img
            src="../assets/loading.gif"
            alt="Loading..."
            class="w-12 h-12"
          />
        </div>
        <div v-if="!isLoading">
          <ul class="list-none ml-4 p-0 font-bold text-left text-2xl text-gray-700">
            <li
              v-for="detail in details"
              :key="detail"
              class="mb-2 bg-transparent"
            >
              - {{ detail }}
            </li>
          </ul>
        </div>
      </div>
      <div
        class="price-line border-dashed pt-4 mt-4 w-full flex justify-between border-t-2 border-slate-700 mt-1 pt-1 border-b-0 border-x-0 text-left"
      >
        <p class="text-2xl font-bold">Стоимость услуги</p>
        <p class="text-2xl font-bold pb-0">{{ formatPrice(service.cost) }}</p>
      </div>
      <div
        class="price-line border-dashed pt-4 mt-4 w-full flex justify-between border-t-2 border-slate-700 mt-1 pt-1 border-b-0 border-x-0 text-left"
      >
        <p class="text-2xl font-bold">Продолжительность работ</p>
        <p class="text-2xl font-bold pb-0">{{ totalDuration }} дней</p>
      </div>
      <PhoneNumberForm @submit="handlePhoneSubmit" />
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import type { PropType } from 'vue'
import PhoneNumberForm from './PhoneNumberForm.vue'
import axios from 'axios'

interface ServiceDetails {
  img: string
  title: string
  cost: number
  description: string
  element_services_id: number
}

interface CatalogItem {
  id: number
  title: string
  description: string
  cost: number
  work_duration: number
  element_services_id: number
  pivot: {
    services_id: number
    elements_id: number
  }
}

export default defineComponent({
  name: 'ServiceModal',
  components: {
    PhoneNumberForm
  },
  props: {
    service: {
      type: Object as PropType<ServiceDetails> | null,
      required: true
    },
    show: {
      type: Boolean,
      default: false
    }
  },
  emits: ['close', 'phone-submitted'],
  data() {
    return {
      details: [] as string[],
      totalDuration: 0,
      isLoading: false
    }
  },
  watch: {
    service: {
      immediate: true,
      handler(newValue, oldValue) {
        if (newValue !== oldValue) {
          this.details = []
          this.fetchDetails()
        }
      }
    }
  },
  methods: {
    closeModal() {
      this.$emit('close')
    },
    handlePhoneSubmit() {
      this.closeModal()
      this.$emit('phone-submitted')
    },
    formatPrice(cost: number) {
      const roundedCost = Math.round(cost)
      return roundedCost.toLocaleString('ru-RU', {
        style: 'currency',
        currency: 'RUB',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      })
    },
    fetchDetails() {
      if (this.service) {
        this.isLoading = true
        axios
          .get(`/api/catalog/${this.service.element_services_id}`)
          .then((response) => {
            this.details = response.data.map((item: CatalogItem) => item.title)
            this.totalDuration = response.data.reduce((acc, item) => acc + item.work_duration, 0)
          })
          .catch((error) => {
            console.error('Error fetching service details:', error)
          })
          .finally(() => {
            this.isLoading = false
          })
      }
    }
  }
})
</script>

<style scoped></style>
