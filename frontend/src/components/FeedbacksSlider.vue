<template>
    <swiper
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
      <swiper-slide>
        <div class="flex justify-between mt-30px mb-40px">
          <div class="green"></div>
        <div class="slide-img-width bgImage round h-10em" :style="{backgroundImage: `url(src/assets/img/feedback1.jpg)`}"></div>
          <div class="slide-info-width owerflow-scroll-y line-height-1em h-10em">
            <p class="font-size-4 font-bold">Дизайн-проект студии</p>
            <p class="pt-1em">
                Нам очень понравился креативный подход, дизайн-проект для нашей квартиры превзошел все наши ожидания.
                 Каждая деталь была продумана, вы воплотили наши мечты в реальность!
            </p>
          </div>
        </div>
      </swiper-slide>

      <swiper-slide>
        <div class="flex justify-between mt-30px mb-40px">
          <div class="green"></div>
        <div class="slide-img-width bgImage round h-10em" :style="{backgroundImage: `url(src/assets/img/feedback2.jpg)`}"></div>
          <div class="slide-info-width owerflow-scroll-y line-height-1em h-10em">
            <p class="font-size-4 font-bold">Ремонт частного дома</p>
            <p class="pt-1em">
                Спасибо вашей студии за превосходный ремонт нашего  дома. 
                Мы очень хотели сохранить атмосферу в доме, но внести немного современности. Все работы выполнялись аккуратно и в срок.
            </p>
          </div>
        </div>
      </swiper-slide>

      <swiper-slide>
        <div class="flex justify-between mt-30px mb-40px">
          <div class="green"></div>
        <div class="slide-img-width bgImage round h-10em" :style="{backgroundImage: `url(src/assets/img/feedback3.jpg)`}"></div>
          <div class="slide-info-width owerflow-scroll-y line-height-1em h-10em">
            <p class="font-size-4 font-bold">Дизайн-проект офиса</p>
            <p class="pt-1em">
                Ваш профессионализм и креативный взгляд сделали наше рабочее пространство не только функциональным, но и вдохновляющим.
                 Мы получили много положительных отзывов от сотрудников.
            </p>
          </div>
        </div>
      </swiper-slide>

      <swiper-slide>
        <div class="flex justify-between mt-30px mb-40px">
          <div class="green"></div>
        <div class="slide-img-width bgImage round h-10em" :style="{backgroundImage: `url(src/assets/img/feedback1.jpg)`}"></div>
          <div class="slide-info-width owerflow-scroll-y line-height-1em h-10em">
            <p class="font-size-4 font-bold">Дизайн-проект студии</p>
            <p class="pt-1em">
                Нам очень понравился креативный подход, дизайн-проект для нашей квартиры превзошел все наши ожидания.
                 Каждая деталь была продумана, вы воплотили наши мечты в реальность!
            </p>
          </div>
        </div>
      </swiper-slide>

      <swiper-slide>
        <div class="flex justify-between mt-30px mb-40px">
          <div class="green"></div>
        <div class="slide-img-width bgImage round h-10em" :style="{backgroundImage: `url(src/assets/img/feedback2.jpg)`}"></div>
          <div class="slide-info-width owerflow-scroll-y line-height-1em h-10em">
            <p class="font-size-4 font-bold">Ремонт частного дома</p>
            <p class="pt-1em">
                Спасибо вашей студии за превосходный ремонт нашего  дома. 
                Мы очень хотели сохранить атмосферу в доме, но внести немного современности. Все работы выполнялись аккуратно и в срок.
            </p>
          </div>
        </div>
      </swiper-slide>

      <swiper-slide>
        <div class="flex justify-between mt-30px mb-40px">
          <div class="green"></div>
        <div class="slide-img-width bgImage round h-10em" :style="{backgroundImage: `url(src/assets/img/feedback3.jpg)`}"></div>
          <div class="slide-info-width owerflow-scroll-y line-height-1em h-10em">
            <p class="font-size-4 font-bold">Дизайн-проект офиса</p>
            <p class="pt-1em">
                Ваш профессионализм и креативный взгляд сделали наше рабочее пространство не только функциональным, но и вдохновляющим.
                 Мы получили много положительных отзывов от сотрудников.
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