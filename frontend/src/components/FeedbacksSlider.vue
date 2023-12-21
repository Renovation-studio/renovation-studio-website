<template>
    <swiper
    v-show="isFeedbacksLoad"
    :modules="[Autoplay, Pagination]"
    :slides-per-view="slidesPerView"
    :centeredSlides="true"
    :speed="1500"
    :space-between="30"
    :loop="true"
    :pagination="{ 
        clickable: true,
        dynamicBullets: true
      }"
    :autoplay="{
      delay: 10000,
      disableOnInteraction: false,
    }"
    class="cursor-pointer"
  >
      <swiper-slide v-for="feedback in feedbacks" :key="feedback.id">
        <div class="flex justify-between mt-30px mb-40px">
          <div class="green"></div>
        <div class="slide-img-width bgImage round h-10em" :style="{backgroundImage: `url(src/assets/img/feedback1.jpg)`}"></div>
          <div class="slide-info-width owerflow-scroll-y line-height-1em h-10em">
            <p class="font-size-4 font-bold">{{ feedback.title }}</p>
            <p class="pt-1em">
              {{ feedback.text }}
            </p>
          </div>
        </div>
      </swiper-slide>
      <swiper-slide v-for="feedback in feedbacks" :key="feedback.id">
        <div class="flex justify-between mt-30px mb-40px">
          <div class="green"></div>
        <div class="slide-img-width bgImage round h-10em" :style="{backgroundImage: `url(src/assets/img/feedback1.jpg)`}"></div>
          <div class="slide-info-width owerflow-scroll-y line-height-1em h-10em">
            <p class="font-size-4 font-bold">{{ feedback.title }}</p>
            <p class="pt-1em">
              {{ feedback.text }}
            </p>
          </div>
        </div>
      </swiper-slide>
    </swiper>
</template>


<script setup lang="ts">
import { Autoplay, Pagination } from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { ref, onMounted, onBeforeUnmount } from 'vue';
import 'swiper/css';
import 'swiper/css/pagination';

type Feedback = {
  id: number;
  title: string;
  text: string;
  imgPath: string;
};
const feedbacks = ref<Feedback[]>([]);
const isFeedbacksLoad = ref(false);

const request = new XMLHttpRequest();
  const url = "http://localhost:8000/api/get/reviews";
  request.open('GET', url);
  request.setRequestHeader('Content-Type', 'application/json');
  request.addEventListener("readystatechange", () => {
  if (request.readyState === 4 && request.status === 200) {
    const responseData = JSON.parse(request.responseText);
    if (responseData.data && Array.isArray(responseData.data)) {
      feedbacks.value = responseData.data.filter((feedback: Feedback) => feedback.id && feedback.title);
      isFeedbacksLoad.value = true;
    }
  }
});
request.send();

const slidesPerView = ref(3);
updateSlidesPerView();

const resizeHandler = () => {
  updateSlidesPerView();
};

onMounted(() => {
  window.addEventListener('resize', resizeHandler);
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', resizeHandler);
});

function updateSlidesPerView() {
  slidesPerView.value = window.innerWidth < 768 ? 1 : 3;
}
</script>


<style scoped>
.slide-info-width {
  width: calc(55% - 0.5em);
}

.slide-img-width {
  width: calc(45% - 0.5em);
}

@media (max-width: 768px) {
  .green {
    background: #cdeae1;
    width: 35%;
    height: 12em;
    position: absolute;
    left: 0;
    bottom: 1.75em;
    z-index: -1;
    border-radius: 0 15px 15px 0;
  }

  .slide-img-width {
    margin-left: 15%;
    width: calc(35% - 0.5em);
  }

  .slide-info-width {
  width: calc(50% - 1em);
}
}

@media (max-width: 549px) {
  .green {
    background: #cdeae1;
    width: 35%;
    height: 11em;
    position: absolute;
    left: 0;
    bottom: 1.75em;
    z-index: -1;
    border-radius: 0 15px 15px 0;
  }

  .slide-img-width {
    height: 9em;
    width: calc(35% - 0.5em);
    margin-left: 15%;
  }

  .slide-info-width {
    height: 9em;
    width: calc(50% - 1em);
}
}
</style>