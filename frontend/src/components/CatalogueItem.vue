<template>
  <div
    class="border shadow-lg overflow-hidden catalogue-item group cursor-pointer max-w-[600px] my-5 mx-auto relative border-10 border-solid border-white"
    @click="openModal"
  >
    <img
      :src="`assets/${item.img}`"
      :alt="item.title"
      class="w-full h-auto object-cover block aspect-square"
    />
    <div
      class="p-4 bg-[#cdeae1] flex justify-between items-center z-10 pb-0 rounded-b-lg max-h-10 pt-0"
    >
      <h3 class="2xl:text-2xl xl:text-sm font-bold truncate">
        {{ item.title }}
      </h3>
      <p class="2xl:text-2xl xl:text-sm truncate">
        {{ formatPrice(item.cost) }}
      </p>
    </div>
    <div
      class="description bg-[#cdeae1] p-4 overflow-hidden max-h-0 group-hover:max-h-56 absolute top-full left-0 right-0 transition-all duration-1000 ease-in-out z-20 py-0 px-4 text-xl rounded-b-lg"
    >
      <p class="text-gray-600">{{ item.description }}</p>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import type { PropType } from "vue";

interface CatalogueItemProps {
  img: string;
  title: string;
  cost: number;
  description: string;
  element_services_id: number;
}

export default defineComponent({
  name: "CatalogueItem",
  props: {
    item: {
      type: Object as PropType<CatalogueItemProps>,
      required: true,
    },
  },
  emits: ["open-modal"],
  methods: {
    formatPrice(cost: number) {
      const roundedCost = Math.round(cost);
      return roundedCost.toLocaleString('ru-RU', { style: 'currency', currency: 'RUB', minimumFractionDigits: 0, maximumFractionDigits: 0 });
    },
    openModal() {
      this.$emit("open-modal", this.item);
    },
  },
});
</script>

<style scoped>
.catalogue-item {
  box-shadow: 0 0 0 1px #cdeae1;
  transition: box-shadow 0.3s ease-in-out;
}

.catalogue-item:hover {
  box-shadow: 0 0 0 2px #cdeae1;
}

.description {
  top: calc(100% - 6px);
}
</style>
