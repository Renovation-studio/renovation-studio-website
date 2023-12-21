<template>
  <div class="catalogue-list mx-50">
    <div
      v-if="isLoading"
      class="flex items-center justify-center my-64"
    >
      <img
        src="../assets/loading.gif"
        alt="Loading..."
        class="w-24 h-24"
      />
    </div>
    <div v-else-if="itemsToShow.length > 0">
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
          @phone-submitted="handlePhoneSubmitSuccess"
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
    <div
      v-else
      class="flex items-center justify-center my-64"
    >
      <img
        src="../assets/search-cross.svg"
        alt="No results found"
        class="mr-4 h-20 w-20"
      />
      <p class="text-3xl font-semibold text-gray-700">Ничего не найдено</p>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, computed } from "vue";
import CatalogueItem from "./CatalogueItem.vue";
import ServiceModal from "./ServiceModal.vue";

interface CatalogueItemProps {
  img: string;
  title: string;
  cost: number;
  description: string;
  element_services_id: number;
}

export default defineComponent({
  name: "CatalogueList",
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
    isLoading: {
      type: Boolean,
      required: true,
    },
  },
  emits: ['phone-submit-success'],
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
    handlePhoneSubmitSuccess() {
      this.$emit('phone-submit-success');
    },
  },
});
</script>

<style scoped></style>
