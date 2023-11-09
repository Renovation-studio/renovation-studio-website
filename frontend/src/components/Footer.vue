<template>
    <footer ref="footer" class="relative">
        <FeedbackForm v-if="feedbackFormEnable" />
        <div ref="footerContainer" class="h-200px bg-#8dd3bb">
            <div ref="about" class="flex pt-30px h-100% w-100%">
                <div class="flex grow flex-justify-center">
                    <div class="flex-col">
                        <img class="w-150px" src="@/assets/img/logo.png" alt="logo" />
                        <p class="font-bold mt-10px mb-10px">Мы в соцсетях</p>
                        <a href="https://facebook.com/"><img class="w-20px mr-10px cursor-pointer" src="@/assets/img/icon_facebook.png" alt="facebook" /></a>
                        <a href="https://www.youtube.com/"><img class="w-20px mr-10px cursor-pointer" src="@/assets/img/icon_youtube.png" alt="youtube" /></a>
                        <a href="https://instagram.com/"><img class="w-20px mr-10px cursor-pointer" src="@/assets/img/icon_instagram.png" alt="instagram" /></a>
                    </div>
                </div>
                <div class="flex grow flex-justify-center">
                    <div class="flex-col">
                        <p class="font-bold mt-10px">Информация о нас</p>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Команда</p></router-link>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Вакансии</p></router-link>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Новости</p></router-link>
                    </div>
                </div>
                <div class="flex grow flex-justify-center">
                    <div class="flex-col">
                        <p class="font-bold mt-10px">Наши услуги</p>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Ремонтные работы</p></router-link>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Дизайн-проект</p></router-link>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Ремонт под ключ</p></router-link>
                    </div>
                </div>
                <div class="flex grow flex-justify-center">
                    <div class="flex-col">
                        <p class="font-bold mt-10px">Контакты</p>
                        <div class="mt-10px">
                            <img class="mr-5px v-middle" src="@/assets/img/icon_phone.png" alt="phone" />
                            <span>+7(999)555-12-34</span>
                        </div>
                        <div class="mt-10px">
                            <img class="mr-5px v-middle" src="@/assets/img/icon_mail.png" alt="mail" />
                            <span>test@mail.ru</span>
                        </div>
                        <div class="mt-10px">
                            <img class="mr-5px v-super" src="@/assets/img/icon_home.png" alt="home" />
                            <span class="inline-block">г. Волгоград, ул. <br> Волгоградская 1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>


<script setup lang="ts">
import FeedbackForm from './FeedbackForm.vue'
import { useRouter } from "vue-router";
import { ref, onMounted } from "vue";

const feedbackFormEnable = ref(false);
const footer = ref<HTMLElement | null>(null);
const footerContainer = ref<HTMLElement | null>(null);
const about = ref<HTMLElement | null>(null);
const router = useRouter();
const currentRoute = router.currentRoute.value; 

onMounted(() => {
    if (currentRoute.path === '/') {
        feedbackFormEnable.value = true;
        if (footer.value) {
            footer.value.style.marginTop = '170px';
        }

        if (footerContainer.value) {
            footerContainer.value.style.height = '400px';
        }

        if (about.value) {
            about.value.style.paddingTop = '220px';
        }
    }
});
</script>


<style scoped>
p.link:hover {
    text-decoration: underline;
}
</style>