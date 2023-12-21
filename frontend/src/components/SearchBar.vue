<template>
  <div class="flex items-center justify-center pt-8">
    <div class="relative w-4/5 mx-auto">
      <input
        v-model="searchQuery"
        type="text"
        class="border-none appearance-none bg-transparent rounded-full w-full px-4 py-3 pr-10 focus:outline-none focus:ring focus:border-blue-300 bg-cdeae1 text-lg font-bold shadow-lg hover:shadow-xl focus:shadow-xl"
        @input="searchInputHandler"
      />
      <img
        src="../assets/search.svg"
        alt="Search Icon"
        class="absolute right-3 top-1/2 transform -translate-y-1/2 h-6 w-6"
      />
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import axios from 'axios'
import debounce from 'lodash/debounce'

export default defineComponent({
  data() {
    return {
      searchQuery: ''
    }
  },
  created() {
    this.debouncedSearch = debounce(this.handleSearch, 500)
  },
  unmounted() {
    this.debouncedSearch.cancel()
  },
  methods: {
    handleSearch() {
      if (this.searchQuery.trim() === '') {
        this.$emit('resetCatalogueItems')
      } else {
        axios
          .get(`/api/search?q=${encodeURIComponent(this.searchQuery)}`)
          .then((response) => {
            this.$emit('update:catalogueItems', response.data)
          })
          .catch((error) => {
            console.error('Error during search:', error)
            this.$emit('update:catalogueItems', [])
          })
      }
    },
    searchInputHandler() {
      this.debouncedSearch()
    }
  }
})
</script>

<style scoped>
.bg-cdeae1 {
  background-color: #cdeae1;
}
</style>
