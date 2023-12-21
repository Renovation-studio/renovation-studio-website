<template>
  <div class="flex justify-center gap-4 p-4">
    <button
      v-for="(filter, index) in filters"
      :key="index"
      :class="getButtonClass(filter.isActive, filter.sortOrder)"
      type="button"
      @click="selectFilter(index)"
    >
      {{ filter.name }}
      <span
        v-if="filter.isSortable"
        class="ml-2 text-lg"
      >
        <template v-if="filter.sortOrder === 'ascending'">&#8593;</template>
        <template v-if="filter.sortOrder === 'descending'">&#8595;</template>
        <template v-if="filter.sortOrder === null">&#8645;</template>
      </span>
    </button>
  </div>
</template>

<script lang="ts">
import { defineComponent, type PropType } from 'vue'

interface FilterOption {
  name: string
  isActive: boolean
  isSortable: boolean
  sortOrder: 'ascending' | 'descending' | null
}

export default defineComponent({
  name: 'FilterButtons',
  props: {
    filters: {
      type: Array as PropType<FilterOption[]>,
      required: true
    }
  },
  methods: {
    getButtonClass(isActive: boolean, sortOrder: 'ascending' | 'descending' | null): string {
      const baseClasses =
        'px-4 py-2 rounded-full text-sm font-medium focus:outline-none transition-colors'
      const activeClasses = 'bg-[#99d8c2]'
      const inactiveClasses = 'bg-[#cdeae1] text-gray-700 hover:bg-[#99d8c2]'
      if (sortOrder || isActive) {
        return `${baseClasses} ${activeClasses}`
      }
      return `${baseClasses} ${inactiveClasses}`
    },
    selectFilter(index: number): void {
      const newFilters = this.filters.map((filter, i) => {
        if (i === index) {
          if (filter.isSortable) {
            let newSortOrder: 'ascending' | 'descending' | null = 'ascending'
            if (filter.sortOrder === 'ascending') newSortOrder = 'descending'
            else if (filter.sortOrder === 'descending') newSortOrder = null
            return {
              ...filter,
              sortOrder: newSortOrder,
              isActive: newSortOrder !== null
            }
          } else {
            return { ...filter, isActive: !filter.isActive, sortOrder: null }
          }
        }
        return { ...filter, isActive: false, sortOrder: null }
      })
      this.$emit('update:filters', newFilters)
    }
  }
})
</script>

<style scoped>
button {
  border: none;
  outline: none;
}
</style>
