<template>
    <footer ref="footer" id="footer" class="relative">
        <ContactForm v-if="contactFormEnable" />
        <div ref="footerContainer" class="h-200px bg-#8dd3bb">
            <div ref="about" class="about margin-s flex justify-between pt-30px h-100%">
                <div class="about-block flex flex-justify-center">
                    <div class="flex-col">
                        <img class="w-150px" src="@/assets/img/logo.png" alt="logo" />
                        <p class="font-bold mt-10px mb-10px">Мы в соцсетях</p>
                        <a href="https://facebook.com/"><img class="w-20px mr-10px cursor-pointer" src="@/assets/img/icon_facebook.png" alt="facebook" /></a>
                        <a href="https://www.youtube.com/"><img class="w-20px mr-10px cursor-pointer" src="@/assets/img/icon_youtube.png" alt="youtube" /></a>
                        <a href="https://instagram.com/"><img class="w-20px mr-10px cursor-pointer" src="@/assets/img/icon_instagram.png" alt="instagram" /></a>
                    </div>
                </div>
                <div class="about-block flex flex-justify-center">
                    <div class="flex-col">
                        <p class="font-bold">Информация о нас</p>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Команда</p></router-link>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Вакансии</p></router-link>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Новости</p></router-link>
                    </div>
                </div>
                <div class="about-block flex flex-justify-center">
                    <div class="flex-col">
                        <p class="font-bold">Наши услуги</p>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Ремонтные работы</p></router-link>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Дизайн-проект</p></router-link>
                        <router-link to="/" class="decoration-none"><p class="link mt-10px">Ремонт под ключ</p></router-link>
                    </div>
                </div>
                <div class="about-block flex flex-justify-center">
                    <div class="flex-col">
                        <p class="font-bold">Контакты</p>
                        <div class="mt-10px">
                            <img class="mr-5px v-middle" src="@/assets/img/icon_phone.png" alt="phone" />
                            <span>+7(927)555-12-34</span>
                        </div>
                        <div class="mt-10px">
                            <img class="mr-5px v-middle" src="@/assets/img/icon_mail.png" alt="mail" />
                            <span>pristroyka@mail.ru</span>
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
import ContactForm from './ContactForm.vue'
import { useRouter } from "vue-router";
import { ref, onMounted } from "vue";

const contactFormEnable = ref(false);
const footer = ref<HTMLElement | null>(null);
const footerContainer = ref<HTMLElement | null>(null);
const about = ref<HTMLElement | null>(null);
const router = useRouter();
const currentRoute = router.currentRoute.value; 

onMounted(() => {
    if (footerContainer.value) {
            if (window.innerWidth <= 380) {
                footerContainer.value.style.height = '480px';
            } else if (window.innerWidth < 768) {
                footerContainer.value.style.height = '340px';
            } else {
                footerContainer.value.style.height = '200px';
            }
        }

    if (currentRoute.path === '/') {
        contactFormEnable.value = true;
        if (footer.value) {
            footer.value.style.marginTop = '200px';
        }

        if (footerContainer.value) {
            if (window.innerWidth <= 380) {
                footerContainer.value.style.height = '800px';
            } else if (window.innerWidth < 549) {
                footerContainer.value.style.height = '560px';
            } else if (window.innerWidth < 768) {
                footerContainer.value.style.height = '560px';
            } else {
                footerContainer.value.style.height = '420px';
            }
        }

        if (about.value) {
            if (window.innerWidth <= 380) {
                about.value.style.paddingTop = '180px';
            } else if (window.innerWidth < 549) {
                about.value.style.paddingTop = '200px';
            } else if (window.innerWidth < 768) {
                about.value.style.paddingTop = '240px';
            } else {
                about.value.style.paddingTop = '250px';
            }
        }
    }
});
</script>


<style scoped>
p.link:hover {
    text-decoration: underline;
}

@media (min-width: 550px) and (max-width: 768px) {
    .about {
       flex-wrap: wrap;
    }

    .about-block {
        margin: 20px;
    }
}

@media (max-width: 549px) {
    .about {
       flex-wrap: wrap;
    }

    .about-block {
        margin: 20px 10px;
    }
}

@media (max-width: 380px) {
    .about {
        flex-wrap: nowrap;
        flex-direction: column;
    }

    .about-block {
        text-align: center;
        margin: 17px 10px;
    }
}
</style>