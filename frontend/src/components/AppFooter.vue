<template>
  <div class="mt-12 container max-w-full mx-auto sm:px-4 bg-main border-none">
    <div class="container mx-auto sm:px-4  mw-90 border-none">
      <footer class="flex flex-wrap  row-cols-5 py-5 border-none">
        <div class="relative flex-grow max-w-full flex-1 px-4">
          <img
            src="../assets/Логотип lg.png"
            alt="Лого"
          >
          <h6 class="mt-2 mb-2 text-sm font-medium">
            Мы в соцсетях:
          </h6>
          <div class="flex flex-wrap  mr-auto">
            <div class="w-1/5">
              <img
                src="..\assets\akar-icons_facebook-fill.png"
                alt=""
              >
            </div>
            <div class="w-1/5">
              <img
                src="..\assets\akar-icons_youtube-fill.png"
                alt=""
              >
            </div>
            <div class="w-1/5">
              <img
                src="..\assets\ant-design_instagram-filled.png"
                alt=""
              >
            </div>
          </div>
        </div>

        <div class="relative flex-grow max-w-full flex-1 px-4" />

        <div class="relative flex-grow max-w-full flex-1 px-4">
          <h6 class="text-sm py-2 px-3.5 p-0 font-medium">
            Услуги
          </h6>
          <ul class="flex flex-wrap list-none mb-0 flex-col">
            <li class="text-muted">
              <a
                href="#"
                class="text-xs text-bold inline-block py-1 px-4 no-underline p-0 text-gray-400"
              >Проектирование</a>
            </li>
            <li class="text-muted">
              <a
                href="#"
                class="text-xs text-bold inline-block py-1 px-4 no-underline p-0 text-gray-400"
              >Строительство</a>
            </li>
            <li class="text-muted">
              <a
                href="#"
                class="text-xs text-bold inline-block py-1 px-4 no-underline p-0 text-gray-400"
              >Отделка и ремонт</a>
            </li>
            <li class="text-muted">
              <a
                href="#"
                class="text-xs text-bold inline-block py-1 px-4 no-underline p-0 text-gray-400"
              >Декорирование</a>
            </li>
          </ul>
        </div>

        <div class="relative flex-grow max-w-full flex-1 px-4">
          <h6 class=" text-sm py-2 px-3.5 p-0 font-medium">
            Информация о нас
          </h6>
          <ul class="flex flex-wrap list-none mb-0 flex-col">
            <li class="text-muted">
              <a
                href="#"
                class="text-xs text-bold inline-block py-1 px-4 no-underline p-0 text-gray-400"
              >Команда</a>
            </li>
            <li class="text-muted">
              <a
                href="#"
                class="text-xs text-bold inline-block py-1 px-4 no-underline p-0 text-gray-400"
              >Вакансии</a>
            </li>
            <li class="text-muted">
              <a
                href="#"
                class="text-xs text-bold inline-block py-1 px-4 no-underline p-0 text-gray-400"
              >Новости</a>
            </li>
          </ul>
        </div>

        <div class="relative flex-grow max-w-full flex-1 px-4">
          <h6 class=" text-sm py-2 px-3.5 p-0 font-medium">
            Контакты
          </h6>
          <ul class="flex flex-wrap list-none mb-0 flex-col pl-3">
            <li class="text-muted">
              <div class="flex flex-wrap">
                <div class="w-1/9 pt-0.5">
                  <span class="material-symbols-outlined text-black text-sm">call</span>
                </div>
                <div class="relative flex-grow max-w-full flex-1 px-1">
                  <a
                    href="#"
                    class="text-xs text-bold inline-block py-1 px-1 no-underline p-0 text-gray-400"
                  >8 999 888 22 55</a>
                </div>
              </div>
            </li>
            <li class="text-muted">
              <div class="flex flex-wrap">
                <div class="w-1/9 pt-0.5">
                  <span class="material-symbols-outlined text-black text-sm">home</span>
                </div>
                <div class="relative flex-grow max-w-full flex-1 px-1">
                  <a
                    href="#"
                    class="text-xs text-bold inline-block py-1 px-1 no-underline p-0 text-gray-400"
                  >г. Волгоград, <br>ул. Волгоградская, 1</a>
                </div>
              </div>
            </li>
            <li class="text-muted">
              <div class="flex flex-wrap">
                <div class="w-1/9 pt-1">
                  <span class="material-symbols-outlined text-black text-sm">mail</span>
                </div>
                <div class="relative flex-grow max-w-full flex-1 px-1">
                  <a
                    href="#"
                    class="text-xs text-bold inline-block py-1 px-1 no-underline p-0 text-gray-400"
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