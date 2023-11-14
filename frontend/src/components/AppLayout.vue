<script lang="ts" setup>
import { ref, type Ref, computed, onMounted, onUnmounted, onUpdated } from 'vue';

const mainPadding = 30;

const header: Ref<HTMLElement | null> = ref(null);

const footer: Ref<HTMLElement | null> = ref(null);

const top = ref(0);

const bottom = ref(0);

const updateOffsets = (): void => {
  top.value = header.value?.offsetHeight ?? 0;
  bottom.value = footer.value?.offsetHeight ?? 0;
};

onMounted(() => {
  updateOffsets();
  window.addEventListener('resize', updateOffsets);
});

onUpdated(() => {
  updateOffsets();
});

onUnmounted(() => {
  window.removeEventListener('resize', updateOffsets);
});

const mainStyles = computed(() => {
  return {
    paddingTop: `${top.value + mainPadding}px`,
    paddingBottom: `${bottom.value + mainPadding}px`,
  };
});
</script>

<template>
  <div class="app-body">
    <div
      ref="header"
      class="app-body__header"
    >
      <slot name="header" />
    </div>
    <main
      class="app-main"
      :style="mainStyles"
    >
      <slot name="main" />
    </main>
    <div
      ref="footer"
      class="app-body__footer"
    >
      <slot name="footer" />
    </div>
  </div>
</template>

<style lang="css" scoped>

.app-body {
  position: relative;
}

.app-body__header {
  padding: 0;
  margin: 0;
  width: 100%;
  position: fixed;
  z-index: 10;
  top: 0;
  left: 0;
}

.app-body__footer {
  padding: 0;
  margin: 0;
  width: 100%;
  position: absolute;
  bottom: 0;
  left: 0;
}
</style>