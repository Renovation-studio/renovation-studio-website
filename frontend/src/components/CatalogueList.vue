<template>
  <div class="catalogue-list mx-50">
    <div class="grid grid-cols-3 gap-6">
      <CatalogueItem
        v-for="(item, index) in itemsToShow"
        :key="index"
        :item="item"
        @open-modal="handleOpenModal"
      />
      <ServiceModal
        :service="selectedService"
        :show="isModalOpen"
        @close="handleCloseModal"
      />
    </div>
    <div class="flex justify-center my-4 mt-1">
      <button
        v-if="hasMoreItems"
        class="text-lg border-none appearance-none px-8 py-4 rounded-full text-xl focus:outline-none transition-colors bg-[#cdeae1] hover:bg-[#99d8c2]"
        @click="loadMore"
      >
        Загрузить еще
      </button>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, computed } from "vue";
import CatalogueItem from "./CatalogueItem.vue";
import ServiceModal from "./ServiceModal.vue";

interface CatalogueItemProps {
  imageUrl: string;
  name: string;
  price: string;
}

export default defineComponent({
  name: "CatalogueList",
  data() {
    return {
      isModalOpen: false,
      selectedService: null,
    };
  },
  methods: {
    handleOpenModal(service) {
      this.selectedService = service;
      this.isModalOpen = true;
    },
    handleCloseModal() {
      this.isModalOpen = false;
    },
  },
  components: {
    CatalogueItem,
    ServiceModal,
  },
  props: {
    catalogueItems: {
      type: Array as PropType<CatalogueItemProps[]>,
      required: true,
    },
    itemsPerPage: {
      type: Number,
      default: 6,
    },
  },
  setup(props) {
    const loadedItemsCount = ref(props.itemsPerPage);

    const itemsToShow = computed(() => {
      return props.catalogueItems.slice(0, loadedItemsCount.value);
    });

    const hasMoreItems = computed(() => {
      return loadedItemsCount.value < props.catalogueItems.length;
    });

    const loadMore = () => {
      loadedItemsCount.value += props.itemsPerPage;
    };

    return {
      itemsToShow,
      hasMoreItems,
      loadMore,
    };
  },
});
</script>

<style scoped></style>
