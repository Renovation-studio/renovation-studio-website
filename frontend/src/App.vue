<template>
  <MainHeader @phone-submit-success="showNotification"></MainHeader>
  <TopNotification
    v-if="notificationVisible"
    message="Заявка отправлена"
  />
  <SearchBar
    @update:catalogueItems="updateCatalogueItems"
    @resetCatalogueItems="resetCatalogueItems"
  />
  <FilterButtons :filters="filters" @update:filters="updateFilters" />
  <CatalogueList :catalogueItems="catalogueItems" @phone-submit-success="showNotification" />
  <MainFooter></MainFooter>
</template>

<script lang="ts">
import { ref, onMounted } from "vue";
import axios from "axios";
import MainHeader from "../src/components/MainHeader.vue";
import MainFooter from "../src/components/MainFooter.vue";
import FilterButtons from "../src/components/FilterButtons.vue";
import CatalogueList from "../src/components/CatalogueList.vue";
import SearchBar from "../src/components/SearchBar.vue";
import TopNotification from './components/TopNotification.vue';

interface FilterOption {
  name: string;
  isActive: boolean;
  isSortable: boolean;
  sortOrder: "ascending" | "descending" | null;
}

interface CatalogueItem {
  img: string;
  title: string;
  cost: number;
  description: string;
  element_services_id: number;
}

export default {
  components: {
    MainHeader,
    MainFooter,
    FilterButtons,
    CatalogueList,
    SearchBar,
    TopNotification,
  },
  setup() {
    const notificationVisible = ref(false);
    function showNotification() {
      console.log("test");
      notificationVisible.value = true;
      setTimeout(() => {
        notificationVisible.value = false;
      }, 2000);
    }

    const filters = ref<FilterOption[]>([
      { name: "А-Я", isActive: false, isSortable: true, sortOrder: null },
      {
        name: "Длительность работы",
        isActive: false,
        isSortable: true,
        sortOrder: null,
      },
      { name: "Цена", isActive: false, isSortable: true, sortOrder: null },
    ]);

    const catalogueItems = ref<CatalogueItem[]>([]);
    const originalCatalogueItems = ref<CatalogueItem[]>([]);

    onMounted(async () => {
      try {
        const catalogResponse = await axios.get(
          "/api/catalog"
        );
        const catalogueItemsWithDetails = await Promise.all(
          catalogResponse.data.map(async (item) => {
            const detailsResponse = await axios.get(
              `/api/catalog/${item.element_services_id}`
            );
            const duration = detailsResponse.data.reduce(
              (acc, detail) => acc + detail.work_duration,
              0
            );
            return { ...item, duration };
          })
        );

        catalogueItems.value = catalogueItemsWithDetails;
        originalCatalogueItems.value = [...catalogueItemsWithDetails];
      } catch (error) {
        console.error("Error fetching catalogue items:", error);
      }
    });

    const handleFilterUpdate = (newFilters: FilterOption[]) => {
      let isSortingActive = false;
      newFilters.forEach((filter) => {
        if (filter.isActive && filter.isSortable) {
          isSortingActive = true;
          if (filter.name === "А-Я") {
            catalogueItems.value.sort((a, b) => {
              return filter.sortOrder === "ascending"
                ? a.title.localeCompare(b.title)
                : b.title.localeCompare(a.title);
            });
          } else if (filter.name === "Цена") {
            catalogueItems.value.sort((a, b) => {
              return filter.sortOrder === "ascending"
                ? a.cost - b.cost
                : b.cost - a.cost;
            });
          } else if (filter.name === "Длительность работы") {
            catalogueItems.value.sort((a, b) => {
              return filter.sortOrder === "ascending"
                ? a.duration - b.duration
                : b.duration - a.duration;
            });
          }
        }
      });

      if (!isSortingActive) {
        console.log(originalCatalogueItems.value);
        catalogueItems.value = [...originalCatalogueItems.value];
      }
    };

    const updateFilters = (newFilters: any) => {
      filters.value = newFilters;
      handleFilterUpdate(newFilters);
    };

    return {
      filters,
      updateFilters,
      catalogueItems,
      originalCatalogueItems,
      notificationVisible,
      showNotification,
    };
  },
  methods: {
    async updateCatalogueItems(newItems) {
      try {
        const catalogueItemsWithDetails = await Promise.all(
          newItems.map(async (item) => {
            const detailsResponse = await axios.get(
              `/api/catalog/${item.element_services_id}`
            );
            const duration = detailsResponse.data.reduce(
              (acc, detail) => acc + detail.work_duration,
              0
            );
            return { ...item, duration };
          })
        );

        this.catalogueItems = catalogueItemsWithDetails;
        this.originalCatalogueItems = [...catalogueItemsWithDetails];
      } catch (error) {
        console.error("Error processing catalogue items:", error);
      }
    },
    async resetCatalogueItems() {
      try {
        const catalogResponse = await axios.get(
          "/api/catalog"
        );
        const catalogueItemsWithDetails = await Promise.all(
          catalogResponse.data.map(async (item) => {
            const detailsResponse = await axios.get(
              `/api/catalog/${item.element_services_id}`
            );
            const duration = detailsResponse.data.reduce(
              (acc, detail) => acc + detail.work_duration,
              0
            );
            return { ...item, duration };
          })
        );

        this.catalogueItems = catalogueItemsWithDetails;
        this.originalCatalogueItems = [...catalogueItemsWithDetails];
      } catch (error) {
        console.error("Error fetching and processing catalog items:", error);
      }
    },
  },
};
</script>

<style>
body {
  margin: 0px;
}
</style>
