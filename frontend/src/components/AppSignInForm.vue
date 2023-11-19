<template>
  <div class="flex flex-wrap font-montserrat text-sm">
    <div
      class="container mx-auto sm:px-3 mt-5 pt-5 pb-3 mb-5 main-container border border-lightgray rounded-xl shadow-lg hover:shadow-2xl"
    >
      <div class="flex flex-wrap">
        <div class="sm:w-4/5 pr-2 pl-2 mx-auto">
          <form
            novalidate
            @submit="checkForm"
          >
            <h1 class="mb-3 text-center font-montserrat text-lg font-bold mt-2">Авторизация</h1>

            <div class="mb-3 border border-lightgray rounded-md">
              <div class="flex flex-wrap">
                <div class="w-1/2 text-center">
                  <div
                    id="div-switch"
                    :class="email
                      ? 'm-0.5 bg-main rounded-md pt-1 pb-1'
                      : 'm-0.5 bg-white rounded pt-1 pb-1 hover:bg-grey'
                    "
                  >
                    <a
                      type="button"
                      class="font-montserrat text-sm"
                      @click="changeInputLoginTypeToEmail()"
                    >
                      Почта
                    </a>
                  </div>
                </div>
                <div class="w-1/2 text-center">
                  <div
                    id="div-switch"
                    :class="
                      !email
                        ? 'm-0.5 bg-main rounded-md pt-1 pb-1'
                        : 'm-0.5 bg-white rounded pt-1 pb-1 hover:bg-grey'
                    "
                  >
                    <a
                      type="button"
                      class="font-montserrat text-sm"
                      @click="changeInputLoginTypeToPhone()"
                    >
                      Телефон
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="mb-1">
              <input
                v-if="email"
                v-model="login"
                type="email"
                :class="
                  errorLogin
                    ? 'block appearance-none w-full py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderred rounded-md'
                    : 'block appearance-none w-full py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-md'
                "
                placeholder="Почта"
                @blur="validateLogin"
              />

              <input
                v-else
                v-model="login"
                v-maska
                data-maska="+7 (###) ###-##-##"
                :class="
                  errorLogin
                    ? 'block appearance-none w-full py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderred rounded-md'
                    : 'block appearance-none w-full py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-md'
                "
                placeholder="Телефон"
              />
            </div>

            <p
              v-if="errorLogin && email"
              class="text-red text-2xs font-montserrat mt-1 mb-3 pl-1"
            >
              Email имеет неверный формат
            </p>
            <p
              v-else-if="errorLogin && !email"
              class="text-red text-2xs font-montserrat mt-1 mb-3 pl-1"
            >
              Телефон имеет неверный формат
            </p>
            <p
              v-else
              class="mt-1 mb-3 pl-1"
            />

            <div class="mb-0.5">
              <div class="relative flex items-stretch w-full">
                <input
                  v-model="password"
                  :type="passIsHidden ? 'password' : 'text'"
                  :class="!errorPassword
                    ? 'block appearance-none w-full py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-md'
                    : 'block appearance-none w-full py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderred rounded-md'"
                  placeholder="Пароль"
                  @blur="validatePassword"
                />
                <div
                  id="eye1"
                  class="input-group-append absolute inset-y-0 right-0 pr-3 mt-1.5 flex items-center leading-5"
                  @click="changePasswordType()"
                >
                  <span class="input-group-text cumancen text-gray text-sm h-full">
                    <i :class="passIsHidden ? 'fas fa-eye' : 'fas fa-eye-slash'" />
                  </span>
                </div>
              </div>
            </div>

            <p
              v-if="errorPassword"
              class="text-red text-2xs font-montserrat mb-1 pl-1"
            >
              {{ errorPassword }}
            </p>
            <p
              v-else
              class="mt-1 mb-1 pl-1"
            />

            <div class="flex items-start mb-3 ml-1">
              <div class="flex items-center h-5">
                <input
                  id="remember"
                  aria-describedby="remember"
                  type="checkbox"
                  class="accent-main checked:bg-main checked:before:bg-main w-3 h-3 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-main dark:bg-gray dark:border-gray dark:focus:ring-main dark:ring-offset-gray"
                />
              </div>
              <div class="ml-1.5 text-sm">
                <label
                  for="remember"
                  class="text-gray-500 dark:text-gray-300 text-xs"
                >
                  Запомнить меня
                </label>
              </div>
            </div>

            <div class="flex flex-wrap mb-1.5 text-center">
              <div class="relative flex-grow max-w-full flex-1">
                <div
                  id="forgotPassword"
                  class="block mt-1 text-sm"
                  @click="$router.push('forgot-password')"
                >
                  Забыли пароль?
                </div>
              </div>
            </div>

            <div class="flex flex-wrap mb-2 text-center">
              <button
                :disabled="!Boolean(password) || !Boolean(login)"
                class="w-4/5 mx-auto h-9 color-btn inline-block align-middle text-center select-none border border-none font-normal whitespace-no-wrap rounded-lg leading-normal no-underline bg-main hover:bg-mainhover disabled:bg-purchase"
                type="submit"
              >
                Войти
              </button>
            </div>

            <div class="flex flex-wrap mb-3 text-center">
              <button
                type="submit"
                class="w-4/5 mx-auto h-9 color-btn inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg leading-normal no-underline bg-white hover:bg-purchase hover:text-white border-main text-main"
              >
                Зарегистрироваться
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { vMaska } from 'maska'

import {ref} from "vue";
import validator from "validator";

// form fields
const login = ref('');
const password = ref('');

const passIsHidden = ref(true);
const email = ref(false);

const errorLogin = ref(false);
const errorPassword = ref('');
const changePasswordType = () => {
  passIsHidden.value = !passIsHidden.value
};

const changeInputLoginTypeToEmail = () => {
  email.value = true
  login.value = ''
};

const changeInputLoginTypeToPhone = () => {
  email.value = false
  login.value = ''
};

const checkForm = async (e: any) => {
  if (errorLogin.value || errorPassword.value) {
    e.preventDefault()
  }
}

const validateLogin = () => {
  errorLogin.value = email.value
      ? !validator.isEmail(String(login.value))
      : !validator.isMobilePhone(String(login.value).replace(/[^0-9]/g,""))
}

const validatePassword = () => {
  errorPassword.value = password.value.length === 0 ? 'Пожалуйста введите пароль' : '';
}
</script>

<style scoped>
.main-container {
  max-width: 320px;
}
#div-switch:hover {
  background-color: lightgray;
}
</style>
