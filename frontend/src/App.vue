<template>
    <FilterButtons :filters="filters" @update:filters="updateFilters" />
  </template>
  
  <script lang="ts">
  import { ref, onMounted } from "vue";
  import axios from "axios";
  import FilterButtons from "../src/components/FilterButtons.vue";
  
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
      FilterButtons,
    },
    setup() {
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
      };
    },
  };
  </script>
  
  <style>
  body {
    margin: 0px;
  }
  </style>
  