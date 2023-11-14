<template>
<div class="contact-form round">
    <div class="w-65%">
        <span class="phone">
            Оставьте свои контактные данные
        </span>
        <span>
            И мы свяжемся с вами
        </span>
        <form @submit.prevent="send" class="mt-15px" action="" method="post">
            <div class="h-40px mt-30px">
                <div class="relative mt-10px">
                    <label class="block mb-5px mt-10px" for="name">Ваше имя</label>
                    <input v-model="name" @input="formatName" class="round" :class="{ 'not-valid': isValidName === false }" type="text" name="name" id="name" maxlength="30" placeholder="Имя">
                    <div v-if="isValidName === false" class="tooltip">
                        <span>
                            <p>Пожалуйста, введите корректное имя.</p>
                            <p>Пример: Никита</p>
                        </span>
                    </div>
                </div>

                <div class="relative mt-10px">
                    <label class="block mb-5px mt-10px" for="phone">Номер телефона</label>
                    <input v-model="phone" @click="add7" @input="formatPhoneNumber" class="round" :class="{ 'not-valid': isValidPhone === false }" type="tel" name="phone" id="phone" maxlength="18" placeholder="+7 (123) 456 78-90">
                    <div v-if="isValidPhone === false" class="tooltip">
                        <span>
                            <p>Пожалуйста, введите корректный номер.</p>
                            <p>Пример: +7 (123) 456 78-90</p>
                        </span>
                    </div>
                </div>

                <div class="relative mt-10px">
                    <label class="block mb-5px" for="email">Почта</label>
                    <input v-model="email" @input="formatEmail" class="round" :class="{ 'not-valid': isValidEmail === false }" type="text" name="email" id="email" maxlength="30" placeholder="example@mail.ru">
                    <div v-if="isValidEmail === false" class="tooltip">
                        <span>
                            <p>Пожалуйста, введите корректную почту.</p>
                            <p>Пример: example@mail.ru</p>
                        </span>
                    </div>
                </div>
            
                <div class="text-center w-70% mt-20px">
                    <button class="sendBtn font-medium round" type="submit">Отправить</button>
                </div>
            </div>
        </form>
    </div>
    <div class="w-35%" style="display: flex; flex-direction: column; justify-content: flex-end;">
        <img class="h-100% flex-self-end pointer-events-none select-none" src="@/assets/img/post.png" alt="post" />
    </div>
</div>
</template>


<script setup lang="ts">
import { ref, computed } from "vue";

const startValidation = ref(false);
const name = ref('');
const phone = ref('');
const email = ref('');

const isValidName = computed(() => {
    let inputName = name.value.replace(/[^\S]/g, '');
    return startValidation.value ? inputName.length > 1 : null;
});

const isValidPhone = computed(() => {
    let inputNumber = phone.value.replace(/\D/g, '');
    return startValidation.value ? inputNumber.length === 11 : null;
});

const isValidEmail = computed(() => {
    return startValidation.value ? /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value) : null;
});

function add7() {
    if (phone.value === '') {
        phone.value = '+7';
    }
}

function formatPhoneNumber () {
    let inputNumber = phone.value.replace(/\D/g, '');
    
    let formattedNumber = '+7';

    if (inputNumber.length > 1) {
        formattedNumber += ' (' + inputNumber.substring(1, 4);
    }

    if (inputNumber.length > 4) {
        formattedNumber += ') ' + inputNumber.substring(4, 7);
    }

    if (inputNumber.length > 7) {
        formattedNumber += '-' + inputNumber.substring(7, 9);
    }

    if (inputNumber.length > 9) {
        formattedNumber += '-' + inputNumber.substring(9, 11);
    }
    
    phone.value = formattedNumber;
}

function formatEmail () {
    email.value = email.value.replace(/[^a-z0-9+_.@-]/g, '');
}

function formatName () {
    name.value = name.value.replace(/[^A-Za-zА-Яа-я\s]/g, '');
}

function send () {
    startValidation.value = true;
    if (isValidName.value && isValidPhone.value && isValidEmail.value) {
        window.location.reload();
    }
}
</script>


<style scoped>
.contact-form {
    position: absolute;
    display: flex;
    justify-content: space-between;
    height: 400px;
    width: calc(100% - 400px);
    background: #cdeae1;
    top: -200px;
    right: 200px;
    padding: 20px;
}

.contact-form .phone {
    display: block;
    margin-bottom: 5px;
    font-size: x-large;
    font-weight: bold;
}

form input {
    height: 43px;
    font-size: large;
    width: 70%;
    border-style: none;
}

form input:focus {
    outline: none;
}

form input.not-valid {
    background: #fbc9c9;
}

form input.not-valid::after {
    content: '!';
    position: absolute;
    top: 50%;
    right: -10px;
    transform: translateY(-50%);
    font-weight: 1000;
    width: 20px;
}

form .sendBtn {
    height: 100%;
    padding: 10px 25px;
    cursor: pointer;
    background: #fff;
    border-width: 1px;
    transition: 0.25s box-shadow;
}

form .sendBtn:hover {
    cursor: pointer;
    background: #fff;
    box-shadow: 2px 3px 6px rgba(0, 0, 0, 0.3);
}

.tooltip {
    display: inline-block;
    position: absolute;
    top: 0.75em;
    width: 250px;
    background-color: #fbc9c9;
    padding: 5px;
    margin-left: 10px;
    border-radius: 5px;
    user-select: none;
}

.tooltip::before {
    content: "";
    position: absolute;
    bottom: calc(50% - 5px);
    left: -15px; 
    border-style: solid;
    border-width: 10px 10px 0;
    border-color: #fbc9c9 transparent transparent transparent;
    transform: rotate(90deg); 
}
</style>