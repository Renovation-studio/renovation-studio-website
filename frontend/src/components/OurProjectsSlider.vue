<template>
    <swiper
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
      <swiper-slide>
        <div class="flex justify-between mt-30px mb-40px">
          <div class="slide-info slide-info-width owerflow-scroll-y line-height-1em h-30em p-2em pr-60px round bg-#8dd3bb">
            <p class="font-size-6 text-center font-bold">Современная классика</p>

            <p class="pt-2em font-medium">Квартира площадью 100 кв. м.</p>

            <p class="pt-1em">Мы создали уникальное пространство, сочетающее современные тренды и комфорт.</p>

            <p class="pt-1em font-medium">Стоимость дизайн-проекта: <span class="font-normal">500 000.</span></p>
            <p class="font-medium">Стоимость материалов: <span class="font-normal">1 500 000.</span></p>
            <p class="font-medium">Общая стоимость ремонта: <span class="font-normal">3 000 000.</span></p>

            <p class="pt-1em font-medium">Что было сделано:</p>

            <p class="pt-1em">
              -Полное обновление интерьера, включая перепланировку помещений и замену старых отделочных материалов.
            </p>
            <p class="pt-1em">
              -Разработка и реализация уникального дизайн-проекта, в том числе выбор цветовой палитры и мебели.
            </p>
            <p class="pt-1em">
              -Закупка и установка высококачественных строительных материалов, таких как
                экологичные полы и современные керамические плитки для ванных комнат и кухни.
            </p>
          </div>
          <div class="slide-info-width flex flex-wrap justify-between flex-content-between h-30em round">
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider1.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider2.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider3.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider4.jpg)`}"></div>
          </div>
        </div>
      </swiper-slide>

      <swiper-slide>
        <div class="flex justify-between mt-30px mb-40px">
          <div class="slide-info slide-info-width owerflow-scroll-y line-height-1em h-30em p-2em pr-60px round bg-#8dd3bb">
            <p class="font-size-6 text-center font-bold">Современная классика</p>

            <p class="pt-2em font-medium">Квартира площадью 100 кв. м.</p>

            <p class="pt-1em">Мы создали уникальное пространство, сочетающее современные тренды и комфорт.</p>

            <p class="pt-1em font-medium">Стоимость дизайн-проекта: <span class="font-normal">500 000.</span></p>
            <p class="font-medium">Стоимость материалов: <span class="font-normal">1 500 000.</span></p>
            <p class="font-medium">Общая стоимость ремонта: <span class="font-normal">3 000 000.</span></p>

            <p class="pt-1em font-medium">Что было сделано:</p>
            <p class="pt-1em">
              -Полное обновление интерьера, включая перепланировку помещений и замену старых отделочных материалов.
            </p>
            <p class="pt-1em">
              -Разработка и реализация уникального дизайн-проекта, в том числе выбор цветовой палитры и мебели.
            </p>
            <p class="pt-1em">
              -Закупка и установка высококачественных строительных материалов, таких как
                экологичные полы и современные керамические плитки для ванных комнат и кухни.
            </p>
          </div>
          <div class="slide-info-width flex flex-wrap justify-between flex-content-between h-30em round">
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider1.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider2.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider3.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider4.jpg)`}"></div>
          </div>
        </div>
      </swiper-slide>

      <swiper-slide>
        <div class="flex justify-between mt-30px mb-40px">
          <div class="slide-info slide-info-width owerflow-scroll-y line-height-1em h-30em p-2em pr-60px round bg-#8dd3bb">
            <p class="font-size-6 text-center font-bold">Современная классика</p>

            <p class="pt-2em font-medium">Квартира площадью 100 кв. м.</p>

            <p class="pt-1em">Мы создали уникальное пространство, сочетающее современные тренды и комфорт.</p>

            <p class="pt-1em font-medium">Стоимость дизайн-проекта: <span class="font-normal">500 000.</span></p>
            <p class="font-medium">Стоимость материалов: <span class="font-normal">1 500 000.</span></p>
            <p class="font-medium">Общая стоимость ремонта: <span class="font-normal">3 000 000.</span></p>

            <p class="pt-1em font-medium">Что было сделано:</p>

            <p class="pt-1em">
              -Полное обновление интерьера, включая перепланировку помещений и замену старых отделочных материалов.
            </p>
            <p class="pt-1em">
              -Разработка и реализация уникального дизайн-проекта, в том числе выбор цветовой палитры и мебели.
            </p>
            <p class="pt-1em">
              -Закупка и установка высококачественных строительных материалов, таких как
                экологичные полы и современные керамические плитки для ванных комнат и кухни.
            </p>
          </div>
          <div class="slide-info-width flex flex-wrap justify-between flex-content-between h-30em round">
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider1.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider2.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider3.jpg)`}"></div>
            <div class="slide-img-width bgImage round h-14.5em" :style="{backgroundImage: `url(src/assets/img/slider4.jpg)`}"></div>
          </div>
        </div>
      </swiper-slide>
    </swiper>
</template>


<script setup lang="ts">
import { Autoplay, Pagination } from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';

</script>


<style scoped>
.slide-info-width {
  width: calc(50% - 1em);
}

.slide-img-width {
  width: calc(50% - 0.5em);
}

@media (min-width: 480px) and (max-width: 768px) {
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
</style>