<template>
  <div class="flex flex-wrap font-montserrat">
    <div class="container mx-auto sm:px-2 mt-5 pt-5 pb-3 mb-5 main-container border border-lightgray rounded-xl shadow-lg hover:shadow-2xl">
      <div class="flex flex-wrap ">
        <div class="sm:w-4/5 mx-auto">
          <form
            novalidate
            @submit.prevent="checkForm"
          >
            <div
              v-show="step === 1"
              class="step"
            >
              <h1 class="mb-3 text-center text-base font-bold mt-2">
                Востановление пароля
              </h1>

              <h3 class="mb-7 text-center font-weight-light w-11/12 mx-auto text-xs text-darkgray">
                Введите адрес электронной почты, чтобы сменить пароль
              </h3>

              <div class="mb-1 mt-3">
                <input
                  id="exampleInputEmail1"
                  v-model="email"
                  type="email"
                  :class="errorEmail
                    ? 'block appearance-none w-4/5 mx-auto py-1 px-2 mb-1 text-sm leading-normal bg-white text-gray-800 border border-borderred rounded-md'
                    : 'block appearance-none w-4/5 mx-auto py-1 px-2 mb-1 text-sm leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-md' "
                  aria-describedby="emailHelp"
                  placeholder="Email"
                >
              </div>

              <p
                v-if="errorEmail"
                class="text-red text-2xs text-center font-montserrat mt-1 mb-2 pl-1"
              >
                Email имеет неверный формат
              </p>
              <p
                v-else
                class="mt-1 mb-2 pl-1"
              />

              <div class="flex flex-wrap mt-10">
                <button
                  type="submit"
                  class="bg-purchase text-sm border-purchase px-2 p-1 w-2/3 mx-auto inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg py-1 leading-normal no-underline bg-blue-600 text-black hover:bg-main"
                  @click="newPassword"
                >
                  Сбросить пароль
                </button>
              </div>

              <div class="flex flex-wrap mt-1 text-center">
                <div
                  id="signIn"
                  class="block text-xs mx-auto mt-1 text-darkgray"
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
              <h1 class="mb-3 text-center text-base font-bold mt-2">
                Востановление пароля
              </h1>

              <h3 class="mb-7 text-center font-weight-light w-11/12 mx-auto text-xs text-darkgray">
                Введите новый пароль и подтвердите его
              </h3>

              <div class="mb-0.5">
                <div class="relative flex items-stretch w-full">
                  <input
                    v-model="password1"
                    type="password"
                    :class="!followsCriteria
                      ? 'block appearance-none mx-auto w-11/12 py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-red rounded-md'
                      : 'block appearance-none mx-auto w-11/12 py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-darkgray rounded-md'"
                    placeholder="Новый пароль"
                  >
                </div>
              </div>

              <p
                v-if="!followsCriteria"
                class="text-red text-2xs t font-montserrat mt-1 mb-2 pl-3"
              >
                Пароль не отвечает требованиям
              </p>
              <p
                v-else
                class="mt-0.5 mb-2.5 pl-1"
              />

              <div class="mb-0.5">
                <div class="relative flex items-stretch w-full">
                  <input
                    v-model="password2"
                    type="password"
                    :class="!passwordsAreSame
                      ? 'block appearance-none mx-auto w-11/12 py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderred rounded-md'
                      : 'block appearance-none mx-auto w-11/12 py-1 px-2 mb-1 text-sm pt-1 pb-1 leading-normal bg-white text-gray-800 border border-borderdarkgray rounded-md'"
                    placeholder="Подтвердите пароль"
                  >
                </div>
              </div>

              <p
                v-if="!passwordsAreSame"
                class="text-red text-2xs font-montserrat mt-1 mb-1 pl-3"
              >
                Пароли не совпадают
              </p>
              <p
                v-else
                class="mt-1 mb-1 pl-1"
              />

              <div class="flex flex-wrap mt-7 mb-2">
                <button
                  type="submit"
                  class="bg-main text-sm border-purchase w-9/12 mx-auto inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg py-1 px-3 leading-normal no-underline bg-blue-600 text-black hover:bg-main"
                  :disabled="!password1 || !password2"
                  @click="submitNewPassword"
                >
                  Сменить пароль
                </button>
              </div>
            </div>


            <div
              v-show="step === 3"
              class="step  mb-10"
            >
              <h1 class="mb-3 text-center text-base font-bold mt-2">
                Пароль изменен!
              </h1>

              <h3 class="mb-7 text-center font-weight-light w-11/12 mx-auto text-xs text-darkgray">
                Теперь вы можете использовать новый пароль, чтобы войти в свой аккаунт
              </h3>

              <div class="flex flex-wrap mt-10 mb-2">
                <button
                  type="submit"
                  class="bg-main text-sm border-purchase w-4/5 mx-auto inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg py-1 px-3 leading-normal no-underline bg-blue-600 text-black hover:bg-main"
                  @click="$router.push('/')"
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

<script lang="ts">
import validator from 'validator';
export default {
  data() {
    return {
      step : 1,
      errorEmail: false,
      passwordsAreSame: true,
      followsCriteria: true,

      email: null,
      password1: null,
      password2: null
    }
  },
  methods: {
    newPassword() {
      this.errorEmail = !validator.isEmail(String(this.email)) || validator.isEmpty(String(this.email))
      if (!this.errorEmail){
        this.step = 2
      }
    },
    checkForm() {
      //something
    },
    submitNewPassword() {
      this.followsCriteria = validator.isStrongPassword(String(this.password1))
      if (this.followsCriteria) {
        this.passwordsAreSame = this.password1 === this.password2
        if (this.passwordsAreSame) {
          this.step = 3
        }
      }
    }
  }
}
</script>
<style scoped>
.main-container{
  max-width: 300px;
}
</style>