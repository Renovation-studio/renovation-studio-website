<script setup lang="ts">
import { ref, onMounted } from "vue";
import { RouterView } from 'vue-router'
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'

const scrollToTopBtn = ref<HTMLElement | null>(null);

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

const handleScroll = () => {
  if (scrollToTopBtn.value) {
    scrollToTopBtn.value.style.visibility = window.scrollY > 200 ? 'visible' : 'hidden';
    scrollToTopBtn.value.style.opacity = window.scrollY > 200 ? '1' : '0';
  }
};

const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
};
</script>

<template>
  <body>
    <Header />
    <transition name="fade" mode="out-in">
      <RouterView />
    </transition>
    <div ref="scrollToTopBtn" class="scroll-to-top" @click="scrollToTop"><img src="@/assets/img/arrow_up.svg" alt="arrow"></div>
    <Footer />
  </body>
</template>


<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
body{
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.scroll-to-top {
  visibility: hidden;
  opacity: 0;
  position: fixed;
  bottom: 40px;
  right: 20px;
  cursor: pointer;
  background: #8dd3bb;
  padding: 10px;
  border-radius: 50%;
  z-index: 999;
  transition: visibility 0.5s, opacity 0.5s ease;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

@media (width < 768px) {
  .scroll-to-top {
    display: none;
  }
}
</style>