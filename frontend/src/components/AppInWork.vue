<template>
  <div class="bg-purchase h-screen w-screen font-montserrat">
    <div class="flex flex-wrap font-montserrat text-lg">
      <div class="container mx-auto pt-5 pb-3 main-container">
        <div class="flex flex-wrap">
          <div class="pr-1 pl-1 mx-auto content-center text-center justify-center">
            <div class="flex justify-center items-center">
              <img
                src="../assets/removebg-preview%201%20(1).png"
                alt=""
              >
            </div>

            <div class="text-[3.75rem] font-bold mw-75 mb-5">
              СТРАНИЦА В РАЗРАБОТКЕ
            </div>

            <div class="text-[2rem] mb-16 font-medium">
              Вместо строительных инструментов у нас в руках клавиатура и мышь. <br>
              Скоро здесь будет так же стильно, как и в наших обновленных интерьерах.
            </div>

            <div class="flex flex-wrap mb-4 text-center">
              <button
                class="font-medium enabled:hover:shadow-[inset_2px_3px_0_rgba(0,0,0,0.2)] p-3 text-2xl disabled:text-muted w-2/5 mx-auto color-btn inline-block align-middle text-center select-none border border-none whitespace-no-wrap rounded-xl leading-normal no-underline bg-main hover:bg-mainhover disabled:bg-purchase"
                @click="$router.push('login')"
              >
                ВЕРНУТЬСЯ НА АВТОРИЗАЦИЮ
              </button>
            </div>

            <div class="text-center font-medium pb-2">
              Свяжитесь с нами
            </div>

            <div class="flex flex-wrap mb-4 text-center pr-3">
              <div class="w-1/2 text-right">
                <div class="flex justify-end">
                  <div class="mt-1.5">
                    <span class="material-symbols-outlined text-black text-lg">call</span>
                  </div>
                  <div class="px-1 text-right">
                    <a
                      href="#"
                      class="text-lg text-bold inline-block py-1 no-underline p-0 text-gray-400"
                    >8 999 888 22 55</a>
                  </div>
                </div>
              </div>

              <div class="w-1/2 text-center pl-3">
                <div class="flex justify-start">
                  <div class="mt-1.5">
                    <span class="material-symbols-outlined text-black text-lg">mail</span>
                  </div>
                  <div class="px-1 text-left">
                    <a
                      href="#"
                      class="text-lg text-bold inline-block py-1 no-underline p-0 text-gray-400"
                    >pristroika@volsu.ru</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex justify-center pb-12">
              <div class="px-4">
                <img
                  src="..\assets\akar-icons_facebook-fill.png"
                  alt=""
                >
              </div>
              <div class="px-4">
                <img
                  src="..\assets\akar-icons_youtube-fill.png"
                  alt=""
                >
              </div>
              <div class="px-4">
                <img
                  src="..\assets\ant-design_instagram-filled.png"
                  alt=""
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">

</script>

<style scoped>
.material-symbols-outlined {
  font-variation-settings:
      'FILL' 1,
      'wght' 400,
      'GRAD' 0,
      'opsz' 24
}
</style>
