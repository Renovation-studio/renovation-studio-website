<template>
  <div class="flex flex-wrap font-montserrat text-lg">
    <div
      class="container mx-auto sm:px-2 pt-5 pb-3 mt-10 main-container border border-lightgray rounded-xl shadow-lg"
    >
      <div class="flex flex-wrap">
        <div class="sm:w-4/5 mx-auto">
          <form
            novalidate
            @submit.prevent="checkForm"
          >
            <div
              v-show="step === 1"
              class="step"
            >
              <h1 class="mb-3 text-center text-2xl font-bold mt-2">Востановление пароля</h1>

              <h3 class="mb-10 text-center font-weight-light w-11/12 mx-auto text-darkgray">
                Введите адрес электронной почты, чтобы сменить пароль
              </h3>

              <div class="mb-1 mt-3">
                <input
                  id="exampleInputEmail1"
                  v-model="email"
                  type="email"
                  :class="
                    errorEmail
                      ? 'block appearance-none w-5/6 mx-auto py-1 px-2 mb-1 leading-normal bg-white text-gray-800 border border-borderred rounded-md'
                      : 'block appearance-none w-5/6 mx-auto py-1 px-2 mb-1 leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-md'
                  "
                  aria-describedby="emailHelp"
                  placeholder="Email"
                  @blur="validateEmail"
                />
              </div>

              <p
                v-if="errorEmail"
                class="text-red text-base text-center font-montserrat mt-1 mb-2 pl-1"
              >
                Email имеет неверный формат
              </p>
              <p
                v-else
                class="mt-1 mb-2 pl-1"
              />

              <div class="flex flex-wrap mt-10 mb-3">
                <button
                  :disabled="!Boolean(email) || errorEmail"
                  class="disabled:bg-purchase disabled:text-muted text-xl border-purchase pt-2 pb-2 px-3 p-1 w-3/4 mx-auto inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg py-1 leading-normal no-underline bg-blue-600 text-black bg-main hover:bg-mainhover enabled:hover:shadow-[inset_2px_3px_0_rgba(0,0,0,0.2)]"
                  type="submit"
                  @click="newPassword"
                >
                  Сбросить пароль
                </button>
              </div>

              <div class="flex flex-wrap mt-1 mb-7 text-center">
                <div
                  id="signIn"
                  class="block mx-auto mt-1 text-darkgray"
                  @click="$router.push('login')"
                >
                  <a href="">Вернуться к авторизации</a>
                </div>
              </div>
            </div>

            <div
              v-show="step === 2"
              class="step mb-4"
            >
              <h1 class="mb-5 text-center text-2xl font-bold mt-2">Востановление пароля</h1>

              <h3 class="mb-12 text-center font-weight-light w-11/12 mx-auto text-lg text-darkgray">
                Введите новый пароль и подтвердите его
              </h3>

              <div class="mb-0.5">
                <div class="relative flex items-stretch w-full">
                  <input
                    v-model="password1"
                    :type="pass1IsHidden ? 'password' : 'text'"
                    :class="
                      !followsCriteria || !passwordsAreSame
                        ? 'block appearance-none mx-auto w-11/12 py-1 px-2 mb-1 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-red rounded-md'
                        : 'block appearance-none mx-auto w-11/12 py-1 px-2 mb-1 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-darkgray rounded-md'
                    "
                    placeholder="Новый пароль"
                    @blur="doesFollowCriteria"
                  />
                  <div
                    id="eye1"
                    class="input-group-append absolute inset-y-0 right-0 pr-5 mt-1.5 flex items-center leading-5"
                    @click="changePasswordType(1)"
                  >
                    <a
                      href="javascript:void(0);"
                      class="input-group-text cumancen text-muted h-full pt-1.5 material-symbols-outlined"
                    >
                      {{ pass1IsHidden ? 'visibility' : 'visibility_off' }}
                    </a>
                  </div>
                </div>
              </div>

              <p
                v-if="!followsCriteria"
                class="text-red text-base t font-montserrat mt-0.5 mb-3.5 pl-3"
              >
                <span class="pb-2">Пароль не отвечает требованиям</span>

                <Popper
                  class="pl-0.5"
                  placement="right"
                  arrow
                >
                  <button class="material-symbols-outlined text-base">help</button>
                  <slot />
                  <template #content="props">
                    <slot
                      name="content"
                      v-bind="props"
                    />
                    <div
                      class="w-320 text-red rounded-lg px-0.5 pt-1 pb-1 bg-white border border-lightgray ml-2"
                    >
                      <div class="m-1 px-1">
                        Пароль должен содержать:
                        <ul class="mt-0.5 pl-5 list-disc">
                          <li>Минимум 8 символов.</li>
                          <li>Заглавные буквы латинского (A-Z) алфавитa.</li>
                          <li>Строчные буквы латинского (A-Z) алфавитa.</li>
                          <li>Арабские цифры (0-9).</li>
                          <li>Специальные символы (!@#$%^&*(),.?”:{}|&gt;&lt;).</li>
                        </ul>
                      </div>
                    </div>
                  </template>
                </Popper>
              </p>
              <p
                v-else
                class="mt-0.5 mb-4 pl-1"
              />

              <div class="mb-0.5">
                <div class="relative flex items-stretch w-full">
                  <input
                    v-model="password2"
                    :type="pass2IsHidden ? 'password' : 'text'"
                    :class="
                      !passwordsAreSame
                        ? 'block appearance-none mx-auto w-11/12 py-1 px-2 mb-1 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderred rounded-md'
                        : 'block appearance-none mx-auto w-11/12 py-1 px-2 mb-1 pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-md'
                    "
                    placeholder="Подтвердите пароль"
                    @blur="arePasswordsSame"
                  />
                  <div
                    id="eye1"
                    class="input-group-append absolute inset-y-0 right-0 pr-5 mt-1.5 flex items-center leading-5"
                    @click="changePasswordType(2)"
                  >
                    <a
                      href="javascript:void(0);"
                      class="input-group-text cumancen text-muted h-full pt-1.5 material-symbols-outlined"
                    >
                      {{ pass2IsHidden ? 'visibility' : 'visibility_off' }}
                    </a>
                  </div>
                </div>
              </div>

              <p
                v-if="!passwordsAreSame"
                class="text-red text-base font-montserrat mt-0.5 mb-10 pl-3"
              >
                Пароли не совпадают
              </p>
              <p
                v-else
                class="mt-1 mb-10 pl-1"
              />

              <div class="flex flex-wrap mt-7 mb-10">
                <button
                  type="submit"
                  class="bg-main pt-2 pb-2 disabled:text-muted enabled:hover:shadow-[inset_2px_3px_0_rgba(0,0,0,0.2)] text-xl border-purchase w-9/12 mx-auto inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg py-1 px-3 leading-normal no-underline bg-blue-600 text-black hover:bg-mainhover disabled:bg-purchase"
                  :disabled="!password1 || !password2 || !passwordsAreSame || !followsCriteria"
                  @click="submitNewPassword"
                >
                  Сменить пароль
                </button>
              </div>
            </div>

            <div
              v-show="step === 3"
              class="step mb-10"
            >
              <h1 class="mb-5 text-center text-2xl font-bold mt-2">Пароль изменен!</h1>

              <h3 class="mb-7 text-center font-weight-light mx-auto text-darkgray">
                Теперь вы можете использовать новый пароль, чтобы войти в свой аккаунт
              </h3>

              <div class="flex flex-wrap mt-10 mb-2">
                <button
                  type="submit"
                  class="enabled:hover:shadow-[inset_2px_3px_0_rgba(0,0,0,0.2)] bg-main text-xl border-purchase pt-2 pb-2 w-3/4 mx-auto inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg py-1 px-3 leading-normal no-underline bg-blue-600 text-black hover:bg-main"
                  @click="$router.push('login')"
                >
                  Авторизоваться
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import validator from 'validator';
import { ref } from 'vue';
import Popper from 'vue3-popper';

import { requestResetToken, resetPassword } from '@/api';

// form fields
const step = ref(1)
const errorEmail = ref(false)
const passwordsAreSame = ref(true)
const followsCriteria = ref(true)

const email = ref('')
const password1 = ref('')
const password2 = ref('')

const pass1IsHidden = ref(true)
const pass2IsHidden = ref(true)
const tooltip = ref(false)

const changePasswordType = (num: number) => {
  if (num === 1) {
    pass1IsHidden.value = !pass1IsHidden.value
  } else if (num === 2) {
    pass2IsHidden.value = !pass2IsHidden.value
  }
}
const validateEmail = () => {
  errorEmail.value =
    !validator.isEmail(String(email.value)) || validator.isEmpty(String(email.value))
}

const token = ref<string | null>(); 

async function newPassword() {
  if (!errorEmail.value) {
    try {
      const res = await requestResetToken({
        email: email.value
      });

      token.value = res.token;
      step.value = 2
    }
    catch(e) {
      errorEmail.value = true;
    }
  }
}
const checkForm = () => {
  
}
const doesFollowCriteria = () => {
  followsCriteria.value = validator.isStrongPassword(String(password1.value))
  arePasswordsSame()
}
const arePasswordsSame = () => {
  passwordsAreSame.value = password1.value === password2.value
}

async function submitNewPassword() {
  if (token.value) {
    try {
      await resetPassword({
        token: token.value,
        newPassword: password1.value,
      });

      step.value = 3;
    }
    catch(e) {
      // some error handling
    }
  }
}
</script>

<style scoped>
.main-container {
  max-width: 420px;
}
.specificLeft {
  left: 57.5%;
}
.specificTop {
  top: 45%;
}
.material-symbols-outlined {
  font-variation-settings:
    'FILL' 0,
    'wght' 400,
    'GRAD' 0,
    'opsz' 24;
}

input {
  padding: 8px 10px;
  line-height: 28px;
}
.w-320 {
  max-width: 320px;
}
.material-symbols-outlined {
  font-variation-settings:
    'FILL' 0,
    'wght' 400,
    'GRAD' 0,
    'opsz' 24;
}
</style>
