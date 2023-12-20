<template>
  <!--Header -->
  <div class="flex flex-wrap font-medium">
    <header class="border-b text-lg	container max-w-full mx-auto sm:px-4 header pt-5 pb-5 bg-white border-none">
      <div class="sm:container mx-auto xl:px-5 mw-75">
        <div class="flex flex-wrap ">
          <!-- ЛОГО -->
          <div class="w-1/6">
            <img
              class="img-logo"
              src="../assets/Логотип lg.png"
              alt="Лого"
            >
          </div>

          <div class="w-1/6 ml-3 mt-4">
            <div class="flex flex-wrap mt-3">
              <div class="pr-0.5 pt-1">
                <img
                  class="img-loc"
                  src="../assets/icon _location on_.png"
                  alt="loc"
                >
              </div>
              <div class="relative flex-grow max-w-full flex-1 pb-1 pt-1 semibold">
                <span class="text-base">Волгоград</span>
              </div>
            </div>
          </div>

          <div
            v-show="$router.currentRoute.value.name !== 'login' && $router.currentRoute.value.name !== 'forgot_password'"
            class="w-7/12 text-right mt-5 pr-5"
          >
            <button
              class="rounded-lg text-bold inline-block py-2 px-4 no-underline repair-order-btn bg-purchase border border-purchase"
              @click="$router.push('login')"
            >
              Войти
            </button>
          </div>
        </div>
      </div>
    </header>
  </div>
  <!--Navbar -->
  <div class="flex flex-wrap mb-5 font-medium text-xl">
    <nav class="flex flex-wrap items-center content-between py-3 px-4  container  max-w-full mx-auto sm:px-4 navbar-container bg-main  pt-6 pb-6">
      <div class="flex flex-wrap  sm:px-4 mx-auto w-65">
        <div class="w-1/5 flex-grow max-w-full flex-1 px-4">
          <a
            class="text-bold inline-block pt-3 py-2 px-4 no-underline nav-item"
            href="#"
            @click="$router.push('catalog')"
          >Услуги</a>
        </div>
        <div class="w-1/5 flex-grow max-w-full flex-1 px-4">
          <a
            class="text-bold inline-block pt-3 py-2 px-4 no-underline nav-item"
            href="#"
            @click="$router.push('catalog')"
          >Портфолио</a>
        </div>
        <div class="w-1/5 flex-grow max-w-full flex-1 px-4">
          <a
            class="text-bold inline-block pt-3 py-2 px-4 no-underline nav-item"
            href="#"
            @click="$router.push('catalog')"
          >Отзывы</a>
        </div>
        <div class="w-1/5 flex-grow max-w-full flex-1 px-4">
          <a
            class="text-bold inline-block pt-3 py-2 px-4 no-underline nav-item"
            href="#"
            @click="$router.push('catalog')"
          >О нас</a>
        </div>
        <div class="w-1/5 flex-grow max-w-full flex-1 px-3">
          <button
            class="rounded-lg text-bold inline-block pt-3 pb-3 py-2 px-4 no-underline repair-order-btn bg-purchase border-none"
            @click="$router.push('catalog')"
          >
            Заказать ремонт
          </button>
        </div>
      </div>
    </nav>
  </div>
</template>

<script setup lang="ts">
</script>
<style scoped>
  .img-logo {
    transform: scale(0.85);
  }
  .img-loc {
    transform: scale(1);
  }
  .navbar-container{
    height: 1%;
  }
  .w-65{
    width: 80%;
  }
  .mw-75{
    max-width: 95%;
  }
</style>