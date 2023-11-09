<template>
  <div class="flex flex-wrap">
    <div class="container mx-auto sm:px-3 mt-5 pt-5 pb-3 mb-5 main-container border border-lightgray rounded-xl shadow-lg hover:shadow-2xl">
      <div class="flex flex-wrap ">
        <div class="sm:w-4/5 pr-2 pl-2 mx-auto">
          <form
            novalidate
            @submit.prevent="checkForm"
          >
            <div
              v-show="step === 1"
              class="step"
            >
              <h1 class="mb-3 text-center text-lg font-bold mt-2">
                Востановление пароля
              </h1>

              <h3 class="mb-7 text-center font-weight-light w-11/12 mx-auto text-sm text-darkgray">
                Введите адрес электронной почты, чтобы сменить пароль
              </h3>

              <div class="mb-1 mt-3">
                <input
                  id="exampleInputEmail1"
                  v-model="email"
                  type="email"
                  :class="errorEmail
                    ? 'block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-red rounded-md'
                    : 'block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-darkgray rounded-md' "
                  aria-describedby="emailHelp"
                  placeholder="Email"
                >
              </div>

              <p
                v-if="errorEmail"
                class="text-red text-2xs font-montserrat mt-1 mb-2 pl-1"
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
                  class="bg-purchase border-purchase w-4/5 mx-auto inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg py-1 px-3 leading-normal no-underline bg-blue-600 text-black hover:bg-main"
                  @click="newPassword"
                >
                  Сбросить пароль
                </button>
              </div>

              <div class="flex flex-wrap mt-1 text-center">
                <div
                  id="signIn"
                  class="block text-sm mx-auto mt-1 text-darkgray"
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
              <h1 class="mb-3 text-center text-lg font-bold mt-2">
                Востановление пароля
              </h1>

              <h3 class="mb-7 text-center font-weight-light w-11/12 mx-auto text-sm text-darkgray">
                Введите новый пароль и подтвердите его
              </h3>

              <div class="mb-0.5">
                <div class="relative flex items-stretch w-full">
                  <input
                    v-model="password1"
                    :type="passIsHidden1 ? 'password' : 'text'"
                    :class="!followsCriteria
                      ? 'block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-red rounded-md'
                      : 'block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-darkgray rounded-md'"
                    placeholder="Новый пароль"
                  >
                  <div
                    id="eye1"
                    class="input-group-append absolute inset-y-0 right-0 pr-3 mt-1.5 flex items-center leading-5"
                    @click="changePasswordType(1)"
                  >
                    <span class="input-group-text cumancen text-gray text-sm h-full"><i :class="passIsHidden1 ? 'fas fa-eye' : 'fas fa-eye-slash'" /></span>
                  </div>
                </div>
              </div>

              <p
                v-if="!followsCriteria"
                class="text-red text-2xs font-montserrat mt-1 mb-2 pl-1"
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
                    :type="passIsHidden2 ? 'password' : 'text'"
                    :class="!passwordsAreSame
                      ? 'block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-red rounded-md'
                      : 'block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-darkgray rounded-md'"
                    placeholder="Повторите ввод"
                  >
                  <div
                    id="eye1"
                    class="input-group-append absolute inset-y-0 right-0 pr-3 mt-1.5 flex items-center leading-5"
                    @click="changePasswordType(2)"
                  >
                    <span class="input-group-text cumancen text-gray text-sm h-full"><i :class="passIsHidden2 ? 'fas fa-eye' : 'fas fa-eye-slash'" /></span>
                  </div>
                </div>
              </div>

              <p
                v-if="!passwordsAreSame"
                class="text-red text-2xs font-montserrat mt-1 mb-1 pl-1"
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
                  class="bg-main border-purchase w-4/5 mx-auto inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg py-1 px-3 leading-normal no-underline bg-blue-600 text-black hover:bg-main"
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
              <h1 class="mb-3 text-center text-lg font-bold mt-2">
                Пароль изменен!
              </h1>

              <h3 class="mb-7 text-center font-weight-light w-11/12 mx-auto text-sm text-darkgray">
                Теперь вы можете использовать новый пароль, чтобы войти в свой аккаунт
              </h3>

              <div class="flex flex-wrap mt-10 mb-2">
                <button
                  type="submit"
                  class="bg-main border-purchase w-4/5 mx-auto inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-lg py-1 px-3 leading-normal no-underline bg-blue-600 text-black hover:bg-main"
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
      passIsHidden1 : true,
      passIsHidden2 : true,
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
    changePasswordType(num: number) {
      if (num === 1) {
        this.passIsHidden1 = !this.passIsHidden1
      } else if (num === 2) {
        this.passIsHidden2 = !this.passIsHidden2
      }
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
  max-width: 330px;
}
</style>