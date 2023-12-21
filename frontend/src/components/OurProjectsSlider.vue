<template>
    <swiper
    v-show="isProjectsLoad"
    :modules="[Autoplay, Pagination]"
    :slides-per-view="1"
    :centeredSlides="true"
    :speed="1500"
    :space-between="100"
    :loop="true"
    :pagination="{ 
        clickable: true,
        dynamicBullets: true
      }"
    :autoplay="{
      delay: 15000,
      disableOnInteraction: false,
    }"
    class="cursor-pointer"
  >
      <swiper-slide v-for="project in projects" :key="project.id">
        <div class="flex justify-between mt-30px mb-40px">
          <div class="slide-info slide-info-width owerflow-scroll-y line-height-1em h-30em p-2em pr-60px round bg-#8dd3bb">
            <p class="title font-size-6 text-center font-bold">{{ project.name }}</p>

            <p class="pt-2em font-medium">{{ project.area }}</p>

            <p class="pt-1em">{{ project.description }}</p>

            <p class="pt-1em font-medium">{{ project.price }}</p>

            <p class="pt-1em font-medium">Что было сделано:</p>

            <p class="pt-1em">
              {{ project.what_was_done }}
            </p>
          </div>
          <div class="img-container slide-info-width flex flex-wrap justify-between flex-content-between h-30em round">
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider1.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider2.jpg)`}"></div>
            <div class="img3 slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider3.jpg)`}"></div>
            <div class="img4 slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider4.jpg)`}"></div>
          </div>
        </div>
      </swiper-slide>
    </swiper>
</template>


<script setup lang="ts">
import { ref } from 'vue';
import { Autoplay, Pagination } from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';

type Project = {
  id: number;
  name: string;
  area: string;
  description: string;
  price: string;
  what_was_done: string;
  imgPath1: string;
  imgPath2: string;
  imgPath3: string;
  imgPath4: string;
};
const projects = ref<Project[]>([]);
const isProjectsLoad = ref(false);

const request = new XMLHttpRequest();
  const url = "http://localhost:8000/api/get/portfolios";
  request.open('GET', url);
  request.setRequestHeader('Content-Type', 'application/json');
  request.addEventListener("readystatechange", () => {
  if (request.readyState === 4 && request.status === 200) {
    const responseData = JSON.parse(request.responseText);
    if (responseData.data && Array.isArray(responseData.data)) {
      projects.value = responseData.data.filter((project: Project) => project.id && project.name);
      isProjectsLoad.value = true;
    }
  }
});
request.send();
</script>


<style scoped>
.slide-info-width {
  width: calc(50% - 1em);
}

.slide-img-width {
  width: calc(50% - 0.5em);
}

@media (min-width: 550px) and (max-width: 768px) {
  .slide-info {
    padding: 1em;
  }

  .slide-info-width {
    height: 20em;
    width: calc(50% - 0.5em);
  }

  .slide-img-width {
    height: 9.5em;
  }
}

@media (max-width: 549px) {
  .slide-info {
    padding: 1em;
  }

  .slide-info-width {
    height: 20em;
    width: calc(60% - 0.5em);
  }

  .slide-img-width {
    height: 9.5em;
    width: 100%;
  }

  .img3 {
    display: none;
  }

  .img4 {
    display: none;
  }

  .img-container {
    flex-direction: column;
    width: calc(40% - 0.5em);
  }
  
  .title {
    font-size: 1.25rem;
  }
}
</style>