<template>
  <div
    v-if="show"
    class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50"
    @click.self="close"
  >
    <div
      class="bg-[#8dd3bb] p-8 rounded-lg relative max-w-2xl w-11/12 mx-4 shadow-md"
    >
      <button
        class="absolute top-4 right-4 text-black text-2xl cursor-pointer bg-transparent border-none outline-0"
        @click="close"
      >
        X
      </button>
      <slot></slot>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, watch } from "vue";

export default defineComponent({
  name: "GenericModal",
  props: {
    modelValue: {
      type: Boolean,
      default: false,
    },
  },
  emits: ["update:modelValue"],
  setup(props, { emit }) {
    const show = ref(props.modelValue);

    watch(
      () => props.modelValue,
      (newValue) => {
        show.value = newValue;
      }
    );

    function close() {
      emit("update:modelValue", false);
    }

    return { show, close };
  },
});
</script>

<style scoped></style>
