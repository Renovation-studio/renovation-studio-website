<template>
<header ref="header">
    <div class="header-container flex justify-between pt-20px pb-20px margin-s">
        <div class="flex items-center">
            <img ref="hamburger" @click="isMenuOpen = !isMenuOpen" class="hamburger w-30px" src="@/assets/img/hamburger.svg" alt="ham" />
            <router-link to="/"><img class="logo w-200px" src="@/assets/img/logo.png" alt="logo" /></router-link>
            <div class="city ml-50px">
                <CitySelector />
            </div>
        </div>
        <div class="flex items-center">
            <router-link to="/login"><button class="loginBtn font-medium round" type="button">Войти</button></router-link>
        </div>
    </div> 
    <transition 
    v-if="isSideMenu"
    enter-active-class="transition ease-out duration-400"
    enter-from-class="opacity-0 transform -translate-x-100%"
    enter-to-class="opacity-100 transform translate-x-0"
    leave-active-class="transition ease-in duration-400"
    leave-from-class="opacity-100 transform translate-x-0"
    leave-to-class="opacity-0 transform -translate-x-100%"
    >
      <div ref="menu" v-show="isMenuOpen" class="menu flex justify-center h-50px bg-#8dd3bb">
          <div class="btn-container margin-s flex pt-20px pb-20px justify-between items-center h-full w-100%">
            <div class="btn-container-left flex justify-between w-800px">
              <button @click="scrollToServices" class="font-medium">Услуги</button>
              <button @click="scrollToProjects" class="font-medium">Портфолио</button>
              <button @click="scrollToFeedbacks" class="font-medium">Отзывы</button>
              <button @click="scrollToFooter" class="font-medium">О нас</button>
            </div>
              <button @click="scrollToContactForm" class="green font-medium round">Заказать ремонт</button>
          </div>
      </div>
  </transition>

  <div ref="menu" v-else="isSideMenu" class="menu flex justify-center h-50px bg-#8dd3bb">
          <div class="btn-container margin-s flex pt-20px pb-20px justify-between items-center h-full w-100%">
            <div class="btn-container-left flex justify-between w-800px">
              <button @click="scrollToServices" class="font-medium">Услуги</button>
              <button @click="scrollToProjects" class="font-medium">Портфолио</button>
              <button @click="scrollToFeedbacks" class="font-medium">Отзывы</button>
              <button @click="scrollToFooter" class="font-medium">О нас</button>
            </div>
              <button @click="scrollToContactForm" class="green font-medium round">Заказать ремонт</button>
          </div>
      </div>
</header>
</template>

<script setup lang="ts">
import CitySelector from './CitySelector.vue'
import { useRouter } from "vue-router";
import { ref, onMounted } from 'vue';

const header = ref<HTMLElement | null>(null);
let prevScrollPos = window.scrollY;
let scrolling = false;

window.onscroll = function() { 
  if (!scrolling) {
    scrolling = true;
    setTimeout(function() {
      if (!header.value || window.getComputedStyle(header.value).position !== 'fixed') {
        return;
      } 
      
      if (window.scrollY < 50) {
        header.value.style.transform = "translateY(0)";
        prevScrollPos = window.scrollY;
        scrolling = false;
        return;
      }

      isMenuOpen.value = false;
      if (prevScrollPos > window.scrollY) {
        header.value.style.transform = "translateY(0)";
      } else {
        header.value.style.transform = "translateY(-100%)";
      }

      prevScrollPos = window.scrollY;
      scrolling = false;
    }, 100);
  }
};


const isMenuOpen = ref(false);
const isSideMenu = ref(true);
const hamburger = ref<HTMLElement | null>(null);
const menu = ref<HTMLElement | null>(null);

onMounted(() => {
  if (
      header.value 
      && window.getComputedStyle(header.value).position !== 'fixed'
      ) {
      isMenuOpen.value = true;
      isSideMenu.value = false;
    }

  window.addEventListener('click', event => {
    if (
      hamburger.value?.outerHTML 
      && !hamburger.value?.contains(event.target as HTMLElement) 
      && header.value 
      && window.getComputedStyle(header.value).position === 'fixed'
      ) {
      isMenuOpen.value = false;
    }
  });
});


const router = useRouter();
const currentRoute = router.currentRoute.value;

const scrollToServices = () => {
    if (currentRoute.path !== '/') {
        return
    }

  router.push({ name: 'landing' }).then(() => {
    const element = document.getElementById('our-services');
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
  });
};

  const scrollToProjects = () => {
    if (currentRoute.path !== '/') {
        return
    }

  router.push({ name: 'landing' }).then(() => {
    const element = document.getElementById('our-projects');
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
  });
};

  const scrollToFeedbacks = () => {
    if (currentRoute.path !== '/') {
        return
    }

  router.push({ name: 'landing' }).then(() => {
    const element = document.getElementById('feedbacks');
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
  });
};

  const scrollToFooter = () => {
    if (currentRoute.path !== '/') {
        return
    }

  router.push({ name: 'landing' }).then(() => {
    const element = document.getElementById('footer');
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
  });
};

const scrollToContactForm = () => {
    if (currentRoute.path !== '/') {
        return
    }
    
  router.push({ name: 'landing' }).then(() => {
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
  });
};
</script>

<style scoped>
.hamburger {
  display: none;
}

button {
    padding: 10px 25px;
    border-style: none;
    cursor: pointer;
}

 button:not(.green, .loginBtn) {
    background: none;
    transition: 0.05s border-bottom;
}

button:not(.green, .loginBtn):hover {
    border-bottom: solid  3px;
}

.loginBtn {
    padding: 10px 25px;
    background: #fff;
    border-style: solid;
    border-width: 1px;
    transition: 0.25s box-shadow;
}

.loginBtn:hover {
    cursor: pointer;
    background: #fff;
    box-shadow: 2px 3px 6px rgba(0, 0, 0, 0.3);
}

button.green {
    background: #cdeae1;
    transition: 0.25s box-shadow;
}

button.green:hover {
    box-shadow: 2px 3px 6px rgba(0, 0, 0, 0.3);
}

@media (max-width: 768px) {
  header {
    position: fixed;
    width: 100%;
    z-index: 999;
    background: #fff;
    transition: transform 0.3s ease-in-out;
  }

  .header-container {
    padding: 10px 0;
    margin-left: 80px;
    margin-right: 20px;
  }
  
  .logo {
    width: 55%;
  }

  .city {
    display: none;
  }

  .hamburger {
    display: block;
    position: absolute;
    left: 20px;
  }

.menu {
  position: absolute;
  background: #fff;
  width: 30%;
  height: 100vh;
}

.btn-container {
  display: block;
  width: 100%;
  padding: 0;
  margin: 0;
}

.btn-container-left {
  flex-direction: column;
  width: 100%;
  padding: 0;
}

.btn-container-left > button {
  width: 100%;
  border-top: solid 2px rgb(218, 207, 207);
  padding: 20px 0;
}

.btn-container-left > button:hover {
  border-bottom: none;
}

button.green {
  background: #fff;
  border-top: solid 2px rgb(218, 207, 207);
  border-bottom: solid 2px rgb(218, 207, 207);
  width: 100%;
  padding: 20px 0;
  border-radius: 0;
}

button.green:hover {
    box-shadow: none;
}
}

@media (max-width: 549px) {
  .logo {
    width: 60%;
  }

  .menu {
  width: 40%;
}
}

@media (max-width: 380px) {
  .logo {
    width: 75%;
  }

  .loginBtn {
    padding: 8px 20px;
  }
}
</style>