<template>
  <div v-if="show" :style="{ opacity: opacity }" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-[#8dd3bb] p-4 rounded-lg shadow-md max-w-md w-full mx-4 mt-32 z-50 transition-opacity duration-500">
    <p class="2xl:text-2xl xl:text-sm font-bold truncate text-center">{{ message }}</p>
  </div>
</template>
  
  <script lang="ts">
  import { defineComponent, ref, onMounted } from "vue";
  
  export default defineComponent({
    name: "TopNotification",
    props: {
      message: {
        type: String,
        required: true,
      },
    },
    setup(props) {
      const show = ref(true);
  
      onMounted(() => {
        setTimeout(() => {
          show.value = false;
        }, 2000);
      });
  
      return { show };
    },
  });
  </script>
  
  <style scoped>
div {
  border: 0px solid black;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}
</style>
  