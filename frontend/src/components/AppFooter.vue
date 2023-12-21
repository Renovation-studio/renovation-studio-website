<template>
  <div class="mt-12 pt-5 container max-w-full mx-auto sm:px-4 bg-main border-none">
    <div class="container mx-auto sm:px-4  mw-90 border-none">
      <footer class="flex flex-wrap  row-cols-5 py-5 border-none">
        <div class="relative flex-grow max-w-full flex-1 px-4">
          <img
            src="../assets/Логотип lg.png"
            alt="Лого"
          >
          <h6 class="mt-2 mb-2 text-xl font-semibold">
            Мы в соцсетях:
          </h6>
          <div class="flex flex-wrap  mr-auto">
            <div class="w-1/6">
              <img
                src="..\assets\akar-icons_facebook-fill.png"
                alt=""
              >
            </div>
            <div class="w-1/6">
              <img
                src="..\assets\akar-icons_youtube-fill.png"
                alt=""
              >
            </div>
            <div class="w-1/6">
              <img
                src="..\assets\ant-design_instagram-filled.png"
                alt=""
              >
            </div>
          </div>
        </div>

        <div class="relative flex-grow max-w-full flex-1 px-4" />

        <div class="relative flex-grow max-w-full flex-1 px-4">
          <h6 class="text-xl py-1 pb-3 px-3.5 p-0 font-medium">
            Услуги
          </h6>
          <ul class="flex flex-wrap list-none mb-0 flex-col">
            <li class="text-muted">
              <a
                href="javascript:void(0);"
                class="text-lg text-bold inline-block pb-3 px-3 no-underline p-0 text-gray-400"
                @click="$router.push('catalog')"
              >Проектирование</a>
            </li>
            <li class="text-muted">
              <a
                href="javascript:void(0);"
                class="text-lg text-bold inline-block pb-3 px-3 no-underline p-0 text-gray-400"
                @click="$router.push('catalog')"
              >Строительство</a>
            </li>
            <li class="text-muted">
              <a
                href="javascript:void(0);"
                class="text-lg text-bold inline-block pb-3 px-3 no-underline p-0 text-gray-400"
                @click="$router.push('catalog')"
              >Отделка и ремонт</a>
            </li>
            <li class="text-muted">
              <a
                href="javascript:void(0);"
                class="text-lg text-bold inline-block pb-3 px-3 no-underline p-0 text-gray-400"
                @click="$router.push('catalog')"
              >Декорирование</a>
            </li>
          </ul>
        </div>

        <div class="relative flex-grow max-w-full flex-1 px-4">
          <h6 class=" text-xl py-1 pb-3 px-3.5 p-0 font-medium">
            Информация о нас
          </h6>
          <ul class="flex flex-wrap list-none mb-0 flex-col">
            <li class="text-muted">
              <a
                href="javascript:void(0);"
                class="text-lg text-bold inline-block pb-3 px-4 no-underline p-0 text-gray-400"
                @click="$router.push('catalog')"
              >Команда</a>
            </li>
            <li class="text-muted">
              <a
                href="javascript:void(0);"
                class="text-lg text-bold inline-block pb-3 px-4 no-underline p-0 text-gray-400"
                @click="$router.push('catalog')"
              >Вакансии</a>
            </li>
            <li class="text-muted">
              <a
                href="javascript:void(0);"
                class="text-lg text-bold inline-block pb-3 px-4 no-underline p-0 text-gray-400"
                @click="$router.push('catalog')"
              >Новости</a>
            </li>
          </ul>
        </div>

        <div class="relative flex-grow max-w-full flex-1 px-4">
          <h6 class=" text-xl py-1 px-3.5 pb-3 p-0 font-medium">
            Контакты
          </h6>
          <ul class="flex flex-wrap list-none mb-0 flex-col pl-3">
            <li class="text-muted pb-3">
              <div class="flex flex-wrap">
                <div class="w-1/9 mt-1.5">
                  <span class="material-symbols-outlined text-black text-lg">call</span>
                </div>
                <div class="relative flex-grow max-w-full flex-1 px-1">
                  <a
                    href="javascript:void(0);"
                    class="text-lg text-bold inline-block py-1 no-underline p-0 text-gray-400"
                    @click="$router.push('landing')"
                  >8 999 888 22 55</a>
                </div>
              </div>
            </li>
            <li class="text-muted pb-3">
              <div class="flex flex-wrap">
                <div class="w-1/9 mt-1.5">
                  <span class="material-symbols-outlined text-black text-lg">home</span>
                </div>
                <div class="relative flex-grow max-w-full flex-1 px-1">
                  <a
                    href="javascript:void(0);"
                    class="text-lg text-bold inline-block py-1 no-underline p-0 text-gray-400"
                    @click="$router.push('landing')"
                  >г. Волгоград, <br>ул. Волгоградская, 1</a>
                </div>
              </div>
            </li>
            <li class="text-muted pb-3">
              <div class="flex flex-wrap">
                <div class="w-1/9 mt-1.5">
                  <span class="material-symbols-outlined text-black text-lg">mail</span>
                </div>
                <div class="relative flex-grow max-w-full flex-1 px-1">
                  <a
                    href="javascript:void(0);"
                    class="text-lg text-bold inline-block py-1 no-underline p-0 text-gray-400"
                    @click="$router.push('landing')"
                  >pristroika@volsu.ru</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </footer>
    </div>
  </div>
</template>

<script setup lang="ts">
</script>
<style scoped>
/* Наследие бутстрапа */
.mw-90{
  max-width: 90%;
}
.material-symbols-outlined {
  font-variation-settings:
      'FILL' 1,
      'wght' 400,
      'GRAD' 0,
      'opsz' 24
}
</style>