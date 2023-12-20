<template>
  <div class="flex flex-wrap font-montserrat text-lg">
    <div
      class="container mx-auto sm:px-3 pt-5 pb-3 main-container border border-lightgray rounded-xl shadow-lg"
    >
      <div class="flex flex-wrap">
        <div class="sm:w-4/5 pr-2 pl-2 mx-auto">
          <form
            novalidate
            @submit="checkForm"
          >
            <h1 class="mb-4 text-center font-montserrat text-2xl font-bold mt-3">Авторизация</h1>

            <div class="mb-4 border border-lightgray rounded-lg">
              <div class="flex flex-wrap">
                <div class="w-1/2 text-center">
                  <div
                    id="div-switch"
                    :class="typeQuery === type.email.valueOf()
                      ? 'mt-0.5 mb-0.5 ml-0.5 bg-main rounded-lg pt-3 pb-3'
                      : 'mt-0.5 mb-0.5 ml-0.5 bg-white rounded-lg pt-3 pb-3 hover:bg-purchase'
                    "
                    @click="changeInputLoginTypeToEmail()"
                  >
                    <a
                      type="button"
                      class="font-montserrat font-medium"
                    >
                      Почта
                    </a>
                  </div>
                </div>
                <div class="w-1/2 text-center">
                  <div
                    id="div-switch"
                    :class="
                      typeQuery === type.phone.valueOf()
                        ? 'mt-0.5 mb-0.5 mr-0.5 bg-main rounded-lg pt-3 pb-3'
                        : 'mt-0.5 mb-0.5 mr-0.5 bg-white rounded-lg pt-3 pb-3 hover:bg-purchase'
                    "
                    @click="changeInputLoginTypeToPhone()"
                  >
                    <a
                      type="button"
                      class="font-montserrat font-medium"
                    >
                      Телефон
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="mb-1">
              <input
                v-if="typeQuery === type.email.valueOf()"
                v-model="login"
                type="email"
                :class="
                  errorLogin
                    ? 'block appearance-none w-full py-1 px-2 mb-2 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderred rounded-lg'
                    : 'block appearance-none w-full py-1 px-2 mb-2 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-lg'
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
                    ? 'block appearance-none w-full py-1 px-2 mb-2 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderred rounded-lg'
                    : 'block appearance-none w-full py-1 px-2 mb-2 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-lg'
                "
                placeholder="Телефон"
                @blur="validateLogin"
              />
            </div>

            <p
              v-if="errorLogin && typeQuery === type.email.valueOf()"
              class="text-red font-montserrat text-base mt-1 mb-5 pl-1"
            >
              Email имеет неверный формат
            </p>
            <p
              v-else-if="errorLogin"
              class="text-red font-montserrat text-base mt-1 mb-5 pl-1"
            >
              Телефон имеет неверный формат
            </p>
            <p
              v-else
              class="mt-1 mb-5 pl-1"
            />

            <div class="mb-0.5">
              <div class="relative flex items-stretch w-full">
                <input
                  v-model="password"
                  :type="passIsHidden ? 'password' : 'text'"
                  :class="!errorPassword
                    ? 'block appearance-none w-full py-1 px-2 mb-1 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-lg'
                    : 'block appearance-none w-full py-1 px-2 mb-1 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderred rounded-lg'"
                  placeholder="Пароль"
                  @blur="validatePassword"
                />
                <div
                  id="eye1"
                  class="input-group-append absolute inset-y-0 right-0 pr-3 mt-1.5 flex items-center leading-5"
                  @click="changePasswordType()"
                >
                  <a
                    href="javascript:void(0);"
                    class="input-group-text cumancen text-muted h-full pt-1.5 material-symbols-outlined"
                  >
                    {{ passIsHidden ? 'visibility' : 'visibility_off' }}
                  </a>
                </div>
              </div>
            </div>

            <p
              v-if="errorPassword"
              class="text-red font-montserrat mb-4 pl-1 text-base"
            >
              {{ errorPassword }}
            </p>
            <p
              v-else
              class="mt-1 mb-4 pl-1"
            />

            <div class="flex items-start mb-3 ml-1">
              <div class="flex items-center h-5">
                <input
                  id="remember"
                  aria-describedby="remember"
                  type="checkbox"
                  class="accent-main checked:bg-main checked:before:bg-main w-5 h-5 border border-gray-300 rounded-2xl bg-gray-50 focus:ring-3 focus:ring-main dark:bg-gray dark:border-gray dark:focus:ring-main dark:ring-offset-gray"
                />
              </div>
              <div class="ml-1.5 mt-0.5 mb-0.5">
                <label
                  for="remember"
                  class="text-gray-500 dark:text-gray-300"
                >
                  Запомнить меня
                </label>
              </div>
            </div>

            <div class="flex flex-wrap mb-3 text-center">
              <div class="relative flex-grow max-w-full flex-1">
                <a
                  id="forgotPassword"
                  href="#"
                  class="block mt-1"
                  @click="$router.push('forgot-password')"
                >
                  Забыли пароль?
                </a>
              </div>
            </div>

            <div class="flex flex-wrap mb-4 text-center">
              <button
                :disabled="!Boolean(password) || !Boolean(login)"
                class="enabled:hover:shadow-[inset_2px_3px_0_rgba(0,0,0,0.2)] pt-2 pb-2 text-xl disabled:text-muted w-4/5 mx-auto color-btn inline-block align-middle text-center select-none border border-none font-normal whitespace-no-wrap rounded-lg leading-normal no-underline bg-main hover:bg-mainhover disabled:bg-purchase"
                type="submit"
              >
                Войти
              </button>
            </div>

            <div class="flex flex-wrap mb-8 text-center">
              <button
                type="submit"
                class="w-4/5 text-xl mx-auto color-btn inline-block pt-2 pb-2 align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg leading-normal no-underline bg-white enabled:hover:shadow-[inset_2px_3px_0_rgba(0,0,0,0.2)] border-main text-main"
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
import { useRouteQuery } from "@vueuse/router"

const enum type{
  email = "email",
  phone = "phone"
}

const typeQuery = useRouteQuery("type", type.email.valueOf()) // or with a default value


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
  typeQuery.value = String(type.email.valueOf())
  errorLogin.value = false
  login.value = ''
};

const changeInputLoginTypeToPhone = () => {
  typeQuery.value = String(type.phone.valueOf())
  errorLogin.value = false
  login.value = ''
};

const checkForm = async (e: any) => {
  if (errorLogin.value || errorPassword.value) {
    e.preventDefault()
  }
}

const validateLogin = () => {
  const numericPhone = String(login.value).replace(/[^0-9]/g,"")
  console.log(String(login.value))
  console.log(validator.isEmail(String(login.value)))
  errorLogin.value = typeQuery.value === type.email.valueOf() || !typeQuery.value
      ? !validator.isEmail(String(login.value))
      : !validator.isMobilePhone(numericPhone) || numericPhone.length < 11
}

const validatePassword = () => {
  errorPassword.value = password.value.length === 0 ? 'Пожалуйста, введите пароль' : '';
}
</script>

<style scoped>
.main-container {
  max-width: 420px;
}

input {
  padding: 8px 10px;
  line-height: 28px;
}

.material-symbols-outlined {
   font-variation-settings:
       'FILL' 0,
       'wght' 400,
       'GRAD' 0,
       'opsz' 24
 }
</style>
