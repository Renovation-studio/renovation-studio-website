<template>
  <main>
    <div class="title-image bgImage h-70vh w-100%" :style="{backgroundImage: `url(src/assets/img/background.jpg)`}">
      <div class="title-block margin-s round">
        <div class="subtitle font-semibold">Ремонт и дизайн интерьера</div>
        <div class="title">
          Студия <br> ремонта <br> ПРИстройка
        </div>
        <button @click="scrollToContactForm" class="green round">Заказать дизайн-проект</button>
      </div>
    </div>

    <div id="our-services" class="margin mt-50px">
      <div class="section-title flex justify-between">
        <span class="font-size-6 font-bold">Наши услуги</span>
        <button v-if="!isRowServices" class="white round">Посмотреть все</button>
      </div>
      <div class="service-container flex justify-between mt-30px">
        <router-link to="/" class="service round flex flex-col flex-items-center w-30%">
          <div class="service-img-container relative w-100%">
            <div class="service-img bgImage round pt-70%" :style="{backgroundImage: `url(src/assets/img/service-renovation.jpg)`}"></div>
          </div>
          <span class="service-name font-semibold mt-30px mb-30px">Косметический ремонт</span>
        </router-link>
        <router-link to="/" v-if="isRowServices" class="service reverse round flex flex-col flex-items-center w-30%">
          <span class="service-name reverse font-semibold mt-30px mb-30px">Дизайн-проект</span>
          <div class="service-img-container reverse relative w-100%">
            <div class="service-img reverse bgImage round pt-70%" :style="{backgroundImage: `url(src/assets/img/service-design.jpg)`}"></div>
          </div>
        </router-link>
        <router-link to="/" v-else="isRowServices" class="service round flex flex-col flex-items-center w-30%">
          <div class="service-img-container relative w-100%">
            <div class="service-img bgImage round pt-70%" :style="{backgroundImage: `url(src/assets/img/service-design.jpg)`}"></div>
          </div>
          <span class="service-name font-semibold mt-30px mb-30px">Дизайн-проект</span>
        </router-link>
        <router-link to="/" class="service round flex flex-col flex-items-center w-30%">
          <div class="service-img-container relative w-100%">
            <div class="service-img bgImage round pt-70%" :style="{backgroundImage: `url(src/assets/img/service-turnkey.jpg)`}"></div>
          </div>
          <span class="service-name font-semibold mt-30px mb-30px">Ремонт под ключ</span>
        </router-link>
      </div>
      <div v-if="isRowServices" class="flex w-100% justify-center">
        <button class="center-btn white round">Посмотреть все</button>
      </div>
    </div>

    <div id="our-projects" class="margin mt-50px">
      <div class="section-title flex justify-between">
        <span class="font-size-6 font-bold">Наши дизайн-проекты</span>
      </div>
      <OurProjectsSlider />
    </div>

    <div id="feedbacks" class="margin mt-50px mb-50px">
      <div class="section-title flex justify-between">
        <span class="feedbacks-title font-size-6 font-bold">Отзывы</span>
      </div>
      <FeedbacksSlider />
    </div>
  </main>
</template>


<script setup lang="ts">
import { ref, onMounted } from 'vue';
import OurProjectsSlider from '../components/OurProjectsSlider.vue'
import FeedbacksSlider from '../components/FeedbacksSlider.vue'
document.title = 'ПРИстройка';
const isRowServices = ref(true);

onMounted(() => {
  isRowServices.value = window.innerWidth < 549 ? true : false;
});

const scrollToContactForm = () => {
  const element = document.getElementById('contact-form');
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' });

    setTimeout(() => {
      element.style.animation = 'shake 0.6s ease-in-out';
    }, 750);

    setTimeout(() => {
      element.style.animation = '';
    }, 1500);
  }
};
</script>


<style scoped>
main {
    flex-grow: 1;
}

.title-block {
  float: left;
  margin-top: 100px;
  padding: 30px;
  background-color: #ecf3f06e;
  backdrop-filter: blur(5px);
}

.title {
  margin-top: 40px;
  margin-bottom: 40px;
  padding-top: 20px;
  padding-bottom: 20px;
  border-top: 3px solid;
  border-bottom: 3px solid;
  font-size: 3rem;
  font-weight: bold;
}

button {
  padding: 10px 25px;
  background: #fff;
  border-width: 1px;
  cursor: pointer;
  transition: 0.25s box-shadow;
}

button.green {
  width: 100%;
  border-style: none;
  font-weight: 550;
  background: #cdeae1;
}

button:hover {
  box-shadow: 2px 3px 6px rgba(0, 0, 0, 0.3);
}

.service {
  cursor: pointer;
  text-decoration: none;
  transition: 0.25s box-shadow;
}

.service:hover {
  box-shadow: 2px 3px 6px rgba(0, 0, 0, 0.3);
}

@media (min-width: 550px) and (max-width: 768px) {
  .title-block {
    margin-top: 85px;
  }

.title-image {
  height: 550px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.title-block {
  margin-left: 0;
  margin-right: 0;
}

#feedbacks {
  margin-left: 0px;
}

.title {
  font-size: 2.5rem;
  text-align: center;
}

.subtitle {
  text-align: center;
}

.feedbacks-title {
  margin-left: 3%;
}
}

@media (max-width: 549px) {
  
  .title-block {
    margin-top: 80px;
  }

.title-image {
  height: 450px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.title-block {
  margin-left: 0;
  margin-right: 0;
}

#feedbacks {
  margin-left: 0px;
}

.title {
  font-size: 2rem;
  text-align: center;
  margin-top: 20px;
  margin-bottom: 20px;
}

.subtitle {
  text-align: center;
}

.font-size-6 {
  font-size: 1.25rem;
}

button {
  padding: 8px 20px;
}

.section-title {
  justify-content: center;
}

#our-services {
  margin-left: 0;
  margin-right: 0;
}

.service-container {
  flex-direction: column;
}

.service {
  width: 95%;
  flex-direction: row;
  margin-bottom: 30px;
  margin-left: 5%;
}

.service.reverse {
  margin-left: 0;
  margin-right: 5%;
}

.service-img-container {
  width: 55%;
}

.service-img {
  width: 100%;
  padding-top: 0;
  height: 150px;
}

.service-name {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  width: 45%;
  margin: 0;
  padding-left: 10px;
  height: 150px;
  background: linear-gradient(to right, #cdeae149, #cdeae1);
}

.service-name.reverse {
  background: linear-gradient(to right, #cdeae1, #cdeae149);
  padding-left: 0;
  padding-right: 10px;
}
}

@media (max-width: 380px) {
  .title-block {
    margin-top: 60px;
  }

  .title-image {
  height: 63vh;
}
}
</style>