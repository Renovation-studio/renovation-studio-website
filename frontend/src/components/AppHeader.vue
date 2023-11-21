<template>
  <!--Header -->
  <div class="flex flex-wrap font-medium">
    <header class="border-b text-lg	container max-w-full mx-auto sm:px-4 header pt-3 pb-2 bg-white border-none">
      <div class="sm:container mx-auto xl:px-5 mw-75">
        <div class="flex flex-wrap ">
          <!-- ЛОГО -->
          <div class="w-1/6">
            <img
              class="img-logo"
              src="../assets/Логотип.png"
              alt="Лого"
            >
          </div>

          <div class="w-1/6">
            <div class="flex flex-wrap  mt-2">
              <div class="w-1/6 pt-1">
                <img
                  src="../assets/icon _location on_.png"
                  alt="loc"
                >
              </div>
              <div class="relative flex-grow max-w-full flex-1 pb-1 pt-1">
                <span class="text-xs">Волгоград</span>
              </div>
            </div>
          </div>

          <div
            v-show="$router.currentRoute.value.name !== 'login' && $router.currentRoute.value.name !== 'forgot_password'"
            class="w-7/12 text-right mt-2"
          >
            <button
              class="text-xs rounded-lg text-bold inline-block py-2 px-4 no-underline repair-order-btn bg-white border border-darkgray"
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
  <div class="flex flex-wrap mb-5 font-medium">
    <nav class="flex flex-wrap items-center content-between py-3 px-4  container  max-w-full mx-auto sm:px-4 navbar-container bg-main">
      <div class="flex flex-wrap  sm:px-4 mx-auto w-65">
        <div class="w-1/5 flex-grow max-w-full flex-1 px-4">
          <a
            class=" text-sm text-bold inline-block py-2 px-4 no-underline nav-item"
            href="#"
          >О нас</a>
        </div>
        <div class="w-1/5 flex-grow max-w-full flex-1 px-4">
          <a
            class="text-sm text-bold inline-block py-2 px-4 no-underline nav-item"
            href="#"
          >Портфолио</a>
        </div>
        <div class="w-1/5 flex-grow max-w-full flex-1 px-4">
          <a
            class="text-sm text-bold inline-block py-2 px-4 no-underline nav-item"
            href="#"
          >Цены</a>
        </div>
        <div class="w-1/5 flex-grow max-w-full flex-1 px-4">
          <a
            class="text-sm text-bold inline-block py-2 px-4 no-underline nav-item"
            href="#"
          >Отзывы</a>
        </div>
        <div class="w-1/5 flex-grow max-w-full flex-1 px-3">
          <button
            class="text-sm rounded-lg text-bold inline-block py-2 px-4 no-underline repair-order-btn bg-purchase border-none"
          >
            Заказать ремонт
          </button>
        </div>
      </div>
    </nav>
  </div>
</template>

<style scoped>
  .img-logo {
    width: 80%;
    height: 85%
  }
  .navbar-container{
    height: 1%;
  }
  .w-65{
    width:65%;
  }
  .mw-75{
    max-width:75%;
  }
</style>