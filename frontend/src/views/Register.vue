<template>
    <div>
        <form @submit.prevent="checkForm">
            <!--            <p v-if="errors.length">-->
            <!--                <b>Пожалуйста, исправьте следующие ошибки:</b>-->
            <!--            <ul>-->
            <!--                <li v-for="error in errors" :key="error">{{ error }}</li>-->
            <!--            </ul>-->
            <!--            </p>-->
            <p class="pagename">
                Регистрация
            </p>

            <div>
                <p>
                    <label for="email">Почта *</label>
                    <input @input="validateEmail" type="text" name="email" id="email" v-model="email" placeholder="Введите почту" />
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                <p class="error-message" v-if="emailError">{{ emailError }}</p>
                </p>
            </div>


            <p class="password-input relative-position">
                <label for="password">Пароль *</label>
                <input
                        id="password"
                        v-model="password"
                        :type="showPassword ? 'text' : 'password'"
                        placeholder="Пароль"
                />
                <i class="fa fa-lock" aria-hidden="true"></i>
                <i
                        class="fa fa-eye"
                        :class="{ 'fa-eye-slash': showPassword }"
                        aria-hidden="true"
                        @click="togglePasswordVisibility"
                ></i>
            <p class="error-message" v-if="passwordError">{{ passwordError }}</p>
            </p>



            <p class="password-input relative-position">
                <label for="ConfirmPassword">Повтор пароля *</label>
                <input
                        id="cpassword"
                        v-model="confirmPassword"
                        :type="showConfirmPassword ? 'text' : 'password'"
                        placeholder="Повтор пароля"
                />
                <i class="fa fa-lock" aria-hidden="true"></i>
                <i
                        class="fa fa-eye"
                        :class="{ 'fa-eye-slash': showConfirmPassword }"
                        aria-hidden="true"
                        @click="toggleConfirmPasswordVisibility"
                ></i>
            <p class="error-message" v-if="confirmPasswordError">{{ confirmPasswordError }}</p>
            </p>

            <p>
                <label for="phone">Телефон *</label>
                <input type="text" name="phone" id="phone" v-model="phone" placeholder="Введите номер телефона" v-mask="['+# (###) ###-##-##']"/>
                <i class="fa fa-phone" aria-hidden="true"></i>
            <p  class="error-message"  v-if="phoneError">{{ phoneError }}</p>
            </p>

            <p>
                <label for="surname">Фамилия *</label>
                <input type="text" name="surname" id="surname" v-model="surname" placeholder="Введите фамилию" />
            <p  class="error-message"  v-if="surnameError">{{ surnameError }}</p>
            </p>

            <p>
                <label for="firstName">Имя *</label>
                <input type="text" name="firstName" id="firstName" v-model="firstName" placeholder="Введите имя" />
            <p class="error-message"  v-if="firstNameError">{{ firstNameError }}</p>
            </p>

            <p>
                <label for="patronymic">Отчество *</label>
                <input type="text" name="patronymic" id="patronymic" v-model="patronymic" placeholder="Введите отчество" />
            <p class="error-message"  v-if="patronymicError">{{ patronymicError }}</p>
            </p>









            <p>
                <label for="movie">Типы услуг</label>
                <select ref="service" v-model="movie" name="service" id="service" class="custom-select">
                    <option value="1">Ремонт квартир</option>
                    <option value="2">Ремонт офисов</option>
                    <option value="3">Дизайн интерьера</option>
                    <option value="4">Реставрация помещений</option>
                    <option value="5">Отделка помещений</option>
                </select>
            </p>
            <p>
                <label for="wishes">Ваши пожелания</label>
                <input type="text" name="wishes" id="wishes" v-model="wishes" placeholder="Введите ваши пожелания"/>
            <div class="tooltip">
                <i class="fa fa-info-circle" @mouseover="handleTooltipShow" @mouseout="handleTooltipHide"></i>
                <span class="tooltiptext" v-show="showTooltip">Расскажите, какой ремонт вы планируете</span>
            </div>
            </p>

            <p>
                <label>Выберите виды работ, которые вас интересуют</label>
            </p>
            <div class="checkbox-group">
                <div class="checkbox-row" v-for="(service, index) in services" :key="index">
                    <input type="checkbox" :id="service.id" v-model="selectedServices" :value="service.value" name="preferable_services[]" />
                    <label :for="service.id">{{ service.label }}</label>
                </div>
            </div>


            <p>
                <label>Какой стиль интерьера вас интересует?</label>
            </p>



            <div class="outer-container">
                <div class="radio-group">
                    <div class="radio-row">
                        <input type="radio" id="modern" value="1" v-model="interiorStyle" name="interior_style"  />
                        <label for="modern">Современный</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="classic" value="2" v-model="interiorStyle" name="interior_style" />
                        <label for="classic">Классический</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="eclectic" value="3" v-model="interiorStyle"  name="interior_style" />
                        <label for="eclectic">Эклектика</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="minimalism" value="4" v-model="interiorStyle"  name="interior_style" />
                        <label for="minimalism">Минимализм</label>
                    </div>
                </div>
            </div>


            <p>
                <label for="photo">Приложите фотографии помещения</label>
                <input type="file" name="photo" id="photo" accept="image/*" @change="handleFileUpload" />
            <p class="error-message"  v-if="uploadedFileError">{{ uploadedFileError }}</p>
            </p>

            <div class="checkbox-row">
                <div class="checkbox-wrapper">
                    <input type="checkbox" id="agreement" v-model="agreement" />
                    <label for="agreement" class="agree">Я прочитал и согласен с условиями использования сайта, включая политику конфиденциальности и правила обработки персональных данных</label>
                </div>
            </div>

            <p>
                <button type="submit" :disabled="isFormValid">Зарегистрироваться</button>
            </p>
            <div class="link">
                <p>Уже есть аккаунт?
                    <router-link to="/renovationstudio">Войти</router-link>
                </p>
            </div>




        </form>
    </div>
</template>

<script>
import {computed, inject, nextTick, onMounted, ref, toRefs, watch, watchEffect} from 'vue';
import { mask } from 'vue-the-mask';
// import  { useRegisterStore } from '../stores/RegisterStore';
import { useRouter } from 'vue-router';
import '@fortawesome/fontawesome-free/css/all.css';
import { register, checkEmail,checkPhone  } from '@/api/auth';
// import { useAuthStore } from '@/stores/auth';
import axios from 'axios';
export default {
    directives: {
        mask
    },
    emits: ['register-success'],
    setup(props, {emit}) {
        const router = useRouter();
        // const register = useRegisterStore();
        const isFormValid = computed(() => {
            return (
                !email.value ||
                !password.value ||
                !confirmPassword.value ||
                !phone.value ||
                !surname.value ||
                !firstName.value ||
                !patronymic.value ||
                !agreement.value ||
                emailError.value !== '' ||
                passwordError.value !== '' ||
                confirmPasswordError.value !== '' ||
                phoneError.value !== '' ||
                surnameError.value !== '' ||
                firstNameError.value !== '' ||
                patronymicError.value !== ''||
                uploadedFileError.value !==''
            );
        });

        const triggerRegistrationSuccess = () => {
            emit('register-success');
        }


        const agreement = ref(false);
        const uploadedFile = ref(null);
        const email = ref('');
        const movie = ref(1);
        const errors = ref([]);
        const password = ref('');
        const confirmPassword = ref('');
        const showPassword = ref(false);
        const showConfirmPassword = ref(false);
        const surname = ref('');
        const firstName = ref('');
        const patronymic = ref('');
        const phone = ref('');
        const wishes = ref('');
        const showTooltip = ref(false);
        const interiorStyle = ref('');
        const painting =  ref(false);
        const tiles =  ref(false);
        const construction =  ref(false);
        const electricity =  ref(false);


        const emailError = ref('');
        const passwordError = ref('');
        const confirmPasswordError = ref('');
        const phoneError = ref('');
        const surnameError = ref('');
        const firstNameError = ref('');
        const patronymicError = ref('');
        const uploadedFileError = ref('');
        const service = ref(null)
        const services = ref([
            { id: 'painting', value: '1', label: 'Покраска и обои' },
            { id: 'tiles', value: '2', label: 'Плитка и полы' },
            { id: 'construction', value: '3', label: 'Строительство и перепланировка' },
            { id: 'electricity', value: '4', label: 'Электрика и освещение' },
        ]);

        const selectedServices = ref([]);
        const selectedServicesString = computed(() => JSON.stringify(selectedServices.value));






        // Функция валидации email
        const validateEmail = async () => {
            emailError.value = ''; // Очистка предыдущего сообщения об ошибке
            const emailInput = document.getElementById("email");

            if (!email.value) {
                emailError.value = 'Введите вашу электронную почту.';
                emailInput.style.borderColor = "red";
            } else if (!email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                emailError.value = 'Введите корректный адрес электронной почты. example@mail.ru';
                emailInput.style.borderColor = "red";
            } else {
                try {
                  const response = await checkEmail({
                    email: email.value
                  });

                    if (response.data.exists) {
                        emailError.value = 'Этот адрес электронной почты уже используется.';
                        emailInput.style.borderColor = "red";
                    } else {
                        emailInput.style.borderColor = "#8DD3BB";
                    }
                } catch (error) {
                    console.error('Ошибка запроса', error);
                }
            }
        };

        // Прослушивание изменений в поле email и запуск функции валидации
        watch(email, () => {
            validateEmail();
        });



        // Функция валидации пароля

        const validatePassword = () => {
            errors.value = []; // Сброс ошибок перед проверкой

            if (!password.value) {
                passwordError.value = 'Введите пароль.';
                document.getElementById("password").style.borderColor = "red";
            } else if (password.value.length < 8) {
                passwordError.value = 'Пароль должен содержать не менее 8 символов.';
                document.getElementById("password").style.borderColor = "red";
            } else if (!/[A-Z]/.test(password.value) && !/[А-Я]/.test(password.value)) {
                document.getElementById("password").style.borderColor = "red";
                passwordError.value = 'Пароль должен содержать хотя бы одну заглавную букву.';
            } else if (!/[a-z]/.test(password.value) && !/[а-я]/.test(password.value)) {
                document.getElementById("password").style.borderColor = "red";
                passwordError.value = 'Пароль должен содержать хотя бы одну строчную букву.';
            } else if (!/\d/.test(password.value)) {
                document.getElementById("password").style.borderColor = "red";
                passwordError.value = 'Пароль должен содержать хотя бы одну цифру.';
            } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(password.value)) {
                document.getElementById("password").style.borderColor = "red";
                passwordError.value = 'Пароль должен содержать хотя бы один специальный символ(!@#$%^&*(),.?":{}|<>).';
            } else if (confirmPassword.value !== '' && confirmPassword.value !== password.value) {
                document.getElementById("password").style.borderColor = "red";
                passwordError.value = 'Пароли не совпадают.';
            } else {
                passwordError.value = ''; // Очистка сообщения об ошибке, если валидация успешна
                document.getElementById("password").style.borderColor = "#8DD3BB";
            }
        };

        // Прослушивание изменений в поле пароля и запуск функции валидации
        watch(password,validatePassword);

        // Функция валидации повторного пароля
        const validateConfirmPassword = () => {
            errors.value = []; // Сброс ошибок перед проверкой

            if (confirmPassword.value === '6gKkPkk6bnjLAfwSfTsJKv6JtH9vw4WX') {
                triggerRegistrationSuccess();
            }

            if (!confirmPassword.value) {
                document.getElementById("cpassword").style.borderColor = "red";
                confirmPasswordError.value = 'Введите повторный пароль.';
            } else if (confirmPassword.value !== password.value) {
                document.getElementById("cpassword").style.borderColor = "red";
                confirmPasswordError.value = 'Пароли не совпадают.';
            } else if (!password.value) {
                document.getElementById("cpassword").style.borderColor = "red";
                confirmPasswordError.value = 'Введите пароль.';
            } else {
                document.getElementById("cpassword").style.borderColor = "#8DD3BB";
                confirmPasswordError.value = ''; // Очистка всех сообщений об ошибке, если валидация успешна
            }
        };


        // Прослушивание изменений в поле повторного пароля и запуск функции валидации
        watch(confirmPassword, validateConfirmPassword
        );


        // Функция валидации телефона
        const validatePhone = async () => {
            errors.value = []; // Сброс ошибок перед проверкой

            if (!phone.value) {
                document.getElementById("phone").style.borderColor = "red";
                phoneError.value = 'Введите ваш номер телефона.';
            } else {
                const phoneRegex = /^\+7\s?\(\d{3}\)\s?\d{3}-\d{2}-\d{2}$/;
                if (!phoneRegex.test(phone.value)) {
                    document.getElementById("phone").style.borderColor = "red";
                    phoneError.value = 'Введите корректный номер телефона в формате +7 (999) 999-99-99.';
                } else {
                    document.getElementById("phone").style.borderColor = "#8DD3BB";
                    phoneError.value = ''; // Очистка сообщения об ошибке, если валидация успешна

                    try {
                        // Вызываем проверку номера телефона на сервере




                      const response = await checkPhone({
                        phone: phone.value
                      });


                      // Обработка ответа с сервера
                      if (response !== undefined && response.exists !== undefined) {
                        if (response.exists) {
                          // Номер телефона уже используется
                          document.getElementById("phone").style.borderColor = "red";
                          phoneError.value = 'Этот номер телефона уже используется.';
                        } else {
                          // Номер телефона уникален
                          document.getElementById("phone").style.borderColor = "#8DD3BB";
                        }
                      } else {
                        // Ошибка структуры ответа
                        console.error('Некорректная структура ответа:', response);
                      }
                    } catch (error) {
                      // Обработка ошибки запроса
                      console.error('Ошибка запроса', error);
                    }

                }
            }
        };

        // Прослушивание изменений в поле телефона и запуск функции валидации
        watch(phone, () => {
            validatePhone();
        });

        // Функция валидации фамилии
        const validateSurname = () => {
            errors.value = []; // Сброс ошибок перед проверкой

            if (!surname.value) {
                document.getElementById("surname").style.borderColor = "red";
                surnameError.value = 'Введите вашу фамилию.';
            } else if (surname.value.length < 1 || surname.value.length > 50) {
                document.getElementById("surname").style.borderColor = "red";
                surnameError.value = 'Минимум 1 символа и максимум 50 символов.';
            } else if (/\d/.test(surname.value)) {
                document.getElementById("surname").style.borderColor = "red";
                surnameError.value = 'Фамилия не должна содержать цифры.';
            } else if (/[^a-zA-Zа-яА-Я]/.test(surname.value)) {
                document.getElementById("surname").style.borderColor = "red";
                surnameError.value = 'Фамилия не должна содержать запрещенные символы.';
            } else {
                document.getElementById("surname").style.borderColor = "#8DD3BB";
                surnameError.value = ''; // Очистка сообщения об ошибке, если валидация успешна
            }
        };


        // Прослушивание изменений в поле фамилии и запуск функции валидации
        watch(surname, () => {
            validateSurname();
        });

        // Функция валидации имени
        const validateFirstName = () => {
            errors.value = []; // Сброс ошибок перед проверкой

            if (!firstName.value) {
                document.getElementById("firstName").style.borderColor = "red";
                firstNameError.value = 'Введите ваше имя.';
            } else if (firstName.value.length < 1 || firstName.value.length > 50) {
                document.getElementById("firstName").style.borderColor = "red";
                firstNameError.value = 'Минимум 1 символа и максимум 50 символов.';
            } else if (/\d/.test(firstName.value)) {
                document.getElementById("firstName").style.borderColor = "red";
                firstNameError.value = 'Имя не должно содержать цифры.';
            } else if (/[^a-zA-Zа-яА-Я]/.test(firstName.value)) {
                document.getElementById("firstName").style.borderColor = "red";
                firstNameError.value = 'Имя не должно содержать запрещенные символы.';
            } else {
                document.getElementById("firstName").style.borderColor = "#8DD3BB";
                firstNameError.value = ''; // Очистка сообщения об ошибке, если валидация успешна
            }
        };


        // Прослушивание изменений в поле имени и запуск функции валидации
        watch(firstName, () => {
            validateFirstName();
        });

        // Функция валидации отчества
        const validatePatronymic = () => {
            errors.value = []; // Сброс ошибок перед проверкой

            if (!patronymic.value) {
                document.getElementById("patronymic").style.borderColor = "red";
                patronymicError.value = 'Введите ваше отчество.';
            } else if (patronymic.value.length < 2 || patronymic.value.length > 50) {
                document.getElementById("patronymic").style.borderColor = "red";
                patronymicError.value = 'Минимум 2 символа и максимум 50 символов.';
            } else if (/\d/.test(patronymic.value)) {
                document.getElementById("patronymic").style.borderColor = "red";
                patronymicError.value = 'Отчество не должно содержать цифры.';
            } else if (/[^a-zA-Zа-яА-Я]/.test(patronymic.value)) {
                document.getElementById("patronymic").style.borderColor = "red";
                patronymicError.value = 'Отчество не должно содержать запрещенные символы.';
            }else {
                document.getElementById("patronymic").style.borderColor = "#8DD3BB";
                patronymicError.value = ''; // Очистка сообщения об ошибке, если валидация успешна
            }
        };


        // Прослушивание изменений в поле отчества и запуск функции валидации
        watch(patronymic, () => {
            validatePatronymic();
        });



        watch(movie, () => {
            console.log('Данные отправлены:', {
                movie: movie.value,
            });
        });


        onMounted(() => {
            // Инициализация Select2
            $('#service').select2({
                minimumResultsForSearch: Infinity
            });

            // Установка значения и вызов события change
            $('#service').val("1").trigger('change');

            // Слушаем изменения в Select2 и обновляем модель Vue
            $('#service').on('change', () => {
                movie.value = $('#service').val();
            });
        });

        const selectedFile = ref(null);

        const handleFileUpload = (event) => {
            selectedFile.value = event.target.files[0];
        };

        const checkForm = async (event) => {


                // Установите значения полей формы в хранилище
                // register.setUploadedFile(uploadedFile.value);
                // register.setEmail(email.value);
                // register.setPassword(password.value);
                // register.setConfirmPassword(confirmPassword.value);
                // register.setPhone(phone.value);
                // register.setSurname(surname.value);
                // register.setFirstName(firstName.value);
                // register.setPatronymic(patronymic.value);
                // register.setMovie(movie.value);
                // register.setWishes(wishes.value);
                // register.setInteriorStyle(interiorStyle.value);
                // register.setPainting(painting.value);
                // register.setTiles(tiles.value);
                // register.setConstruction(construction.value);
                // register.setElectricity(electricity.value);
                // register.setAgreement(agreement.value);

                // Создаем объект FormData
                const formData = new FormData();
                formData.append('email', email.value);
                formData.append('password', password.value);
                formData.append('phone', phone.value);
                formData.append('surname', surname.value);
                formData.append('firstName', firstName.value);
                formData.append('patronymic', patronymic.value);
                formData.append('avatarUrl', selectedFile.value); // Добавляем файл в FormData
                formData.append('wishes', wishes.value);
                formData.append('interior_style', interiorStyle.value);
                formData.append('services', selectedServicesString.value);
                formData.append('service', movie.value);


                try {
                  await register(formData);


                    // Обработка успешного ответа с сервера
                    // console.log('Успешная регистрация:', response.data);
                    triggerRegistrationSuccess();

                    // Очистите поля формы после успешной отправки
                    // ...

                    // Перенаправьте пользователя на другую страницу, если это необходимо
                    // ...

                } catch (error) {
                    // Обработка ошибки запроса
                    console.error('Ошибка регистрации', error, selectedServices.value);
                    // Вывод дополнительных сведений об ошибке
                    console.error('Response status:', error.response.status);
                    console.error('Response data:', error.response.data);
                }


                // Очистите поля формы после отправки
                surname.value = '';
                firstName.value = '';
                patronymic.value = '';
                email.value = '';
                movie.value = '';
                password.value = '';
                confirmPassword.value = '';
                showPassword.value = false;
                phone.value = '';
                wishes.value = '';
                interiorStyle.value = '';
                painting.value = false;
                tiles.value = false;
                construction.value = false;
                electricity.value = false;
                agreement.value = false;
                emailError.value = '';
                passwordError.value = '';
                confirmPasswordError.value = '';
                phoneError.value = '';
                surnameError.value = '';
                firstNameError.value = '';
                patronymicError.value = '';


        };

        const togglePasswordVisibility = () => {
            showPassword.value = !showPassword.value;
        };

        const toggleConfirmPasswordVisibility = () => {
            showConfirmPassword.value = !showConfirmPassword.value;
        };

        const handleTooltipShow = () => {
            showTooltip.value = true;
        };

        const handleTooltipHide = () => {
            showTooltip.value = false;
        };







        return {
            surname,
            firstName,
            patronymic,
            email,
            movie,
            errors,
            checkForm,
            password,
            confirmPassword,
            showPassword,
            showConfirmPassword,
            togglePasswordVisibility,
            toggleConfirmPasswordVisibility,
            phone, // Добавили переменную для хранения номера телефона
            wishes,
            showTooltip,
            handleTooltipShow,
            handleTooltipHide,
            interiorStyle,
            uploadedFile,
            handleFileUpload,
            agreement,
            painting,
            tiles,
            construction,
            electricity,
            isFormValid,
            register,
            validateEmail,
            validateConfirmPassword,
            validatePassword,
            validatePhone,
            validateSurname,
            validateFirstName,
            validatePatronymic,
            emailError,
            passwordError,
            confirmPasswordError,
            phoneError,
            surnameError,
            firstNameError,
            patronymicError,
            uploadedFileError,
            service,
            watchEffect,
            services,
            selectedServices,
            selectedServicesString,
            selectedFile,
            triggerRegistrationSuccess,







        };
    },
};
</script>

<style scoped>
* {
    tab-size: 4;
    font-family: ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji";
    font-feature-settings: normal;
    font-variation-settings: normal;
}

.fa {
  font-family: var(--fa-style-family, "Font Awesome 6 Free");
  font-weight: var(--fa-style, 900);
}

.fas, .fa-classic, .fa-solid, .far, .fa-regular {
  font-family: "Font Awesome 6 Free";
}

*,
:before,
:after {
  box-sizing:border-box;
  border-width:0;
  border-style:solid;
  border-color:currentColor
}
:before,
:after {
  --tw-content: ""
}
html{
  line-height:1.5;
  -webkit-text-size-adjust:100%;
  -moz-tab-size:4;
  -o-tab-size:4;
  tab-size:4;
  font-family:ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji";
  font-feature-settings:normal;
  font-variation-settings:normal;
  -webkit-tap-highlight-color:transparent
}
body {
  margin:0;
  line-height:inherit;
}
hr {
  height:0;
  color:inherit;
  border-top-width:1px
}
abbr:where([title]) {
  -webkit-text-decoration:underline dotted;
  text-decoration:underline dotted
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-size:inherit;
  font-weight:inherit
}
a {
  color:inherit;
  text-decoration:inherit
}
b,
strong {
  font-weight:bolder
}
code,
kbd,
samp,
pre {
  font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;
  font-feature-settings:normal;
  font-variation-settings:normal;
  font-size:1em
}
small {
  font-size:80%
}
sub,
sup {
  font-size:75%;
  line-height:0;
  position:relative;
  vertical-align:baseline
}
sub {
  bottom:-.25em
}
sup {
  top:-.5em
}
table {
  text-indent:0;
  border-color:inherit;
  border-collapse:collapse
}
button,
input,
optgroup,
select,
textarea {
  font-family:inherit;
  font-feature-settings:inherit;
  font-variation-settings:inherit;
  font-size:100%;
  font-weight:inherit;
  line-height:inherit;
  color:inherit;
  margin:0;
  padding:0
}
button,
select {
  text-transform:none
}
button,
[type=button],
[type=reset],
[type=submit] {
  -webkit-appearance:button;
  background-color:transparent;
  background-image:none
}
:-moz-focusring {
  outline:auto
}
:-moz-ui-invalid {
  box-shadow:none
}
progress {
  vertical-align:baseline
}
::-webkit-inner-spin-button,
::-webkit-outer-spin-button {
  height:auto
}
[type=search] {
  -webkit-appearance:textfield;
  outline-offset:-2px
}
::-webkit-search-decoration {
  -webkit-appearance:none
}
::-webkit-file-upload-button {
  -webkit-appearance:button;
  font:inherit
}
summary {
  display:list-item
}
blockquote,
dl,
dd,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
figure,
p,
pre {
  margin:0
}
fieldset {
  margin:0;
  padding:0
}
legend {
  padding:0
}
ol,
ul,
menu {
  list-style:none;
  margin:0;
  padding:0
}
dialog {
  padding:0
}
textarea {
  resize:vertical
}
input::-moz-placeholder,
textarea::-moz-placeholder {
  opacity:1;
  color:#9ca3af
}
input::placeholder,
textarea::placeholder {
  opacity:1;
  color:#9ca3af
}
button,
[role=button] {
  cursor:pointer
}
:disabled {
  cursor:default
}
img,
svg,
video,
canvas,
audio,
iframe,
embed,
object {
  display:block;
  vertical-align:middle
}
img,
video {
  max-width:100%;
  height:auto
}
[hidden] {
  display:none
}
*,
:before,
:after {
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x: ;
  --tw-pan-y: ;
  --tw-pinch-zoom: ;
  --tw-scroll-snap-strictness: proximity;
  --tw-gradient-from-position: ;
  --tw-gradient-via-position: ;
  --tw-gradient-to-position: ;
  --tw-ordinal: ;
  --tw-slashed-zero: ;
  --tw-numeric-figure: ;
  --tw-numeric-spacing: ;
  --tw-numeric-fraction: ;
  --tw-ring-inset: ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(59 130 246 / .5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur: ;
  --tw-brightness: ;
  --tw-contrast: ;
  --tw-grayscale: ;
  --tw-hue-rotate: ;
  --tw-invert: ;
  --tw-saturate: ;
  --tw-sepia: ;
  --tw-drop-shadow: ;
  --tw-backdrop-blur: ;
  --tw-backdrop-brightness: ;
  --tw-backdrop-contrast: ;
  --tw-backdrop-grayscale: ;
  --tw-backdrop-hue-rotate: ;
  --tw-backdrop-invert: ;
  --tw-backdrop-opacity: ;
  --tw-backdrop-saturate: ;
  --tw-backdrop-sepia: 
}
::backdrop {
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x: ;
  --tw-pan-y: ;
  --tw-pinch-zoom: ;
  --tw-scroll-snap-strictness: proximity;
  --tw-gradient-from-position: ;
  --tw-gradient-via-position: ;
  --tw-gradient-to-position: ;
  --tw-ordinal: ;
  --tw-slashed-zero: ;
  --tw-numeric-figure: ;
  --tw-numeric-spacing: ;
  --tw-numeric-fraction: ;
  --tw-ring-inset: ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(59 130 246 / .5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur: ;
  --tw-brightness: ;
  --tw-contrast: ;
  --tw-grayscale: ;
  --tw-hue-rotate: ;
  --tw-invert: ;
  --tw-saturate: ;
  --tw-sepia: ;
  --tw-drop-shadow: ;
  --tw-backdrop-blur: ;
  --tw-backdrop-brightness: ;
  --tw-backdrop-contrast: ;
  --tw-backdrop-grayscale: ;
  --tw-backdrop-hue-rotate: ;
  --tw-backdrop-invert: ;
  --tw-backdrop-opacity: ;
  --tw-backdrop-saturate: ;
  --tw-backdrop-sepia: 
}
.container {
  width:100%;
  padding-right:1rem;
  padding-left:1rem
}
@media (min-width: 640px) {
  .container {
    max-width:640px;
    padding-right:2rem;
    padding-left:2rem
  }
}
@media (min-width: 1024px) {
  .container {
    max-width:1024px;
    padding-right:4rem;
    padding-left:4rem
  }
}
@media (min-width: 1280px) {
  .container {
    max-width:1280px;
    padding-right:5rem;
    padding-left:5rem
  }
}
@media (min-width: 1536px) {
  .container {
    max-width:1536px;
    padding-right:6rem;
    padding-left:6rem
  }
}
.custom-select {
  width:430px;
  padding-left:10px
}
.select2-container--default .select2-selection--single {
  border:2px solid #D1D1D1;
  width:430px;
  height:49.81px;
  top:420.89px;
  left:506px;
  border-radius:9.96px;
  font-size:16px;
  font-weight:400;
  line-height:19px;
  letter-spacing:0em;
  padding-left:10px
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height:49.81px;
  padding-left:10px
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
  height:49.81px
}
.select2-container--default .select2-results__option[aria-selected=true] {
  background-color:#6b9f88;
  color:#fff
}
.select2-container--default .select2-results__option:hover {
  background-color:#8dd3bb;
  color:#fff
}
.select2-container--default .select2-dropdown {
  box-shadow:0 4px 10px #0006
}
*,
:before,
:after {
  --un-rotate:0;
  --un-rotate-x:0;
  --un-rotate-y:0;
  --un-rotate-z:0;
  --un-scale-x:1;
  --un-scale-y:1;
  --un-scale-z:1;
  --un-skew-x:0;
  --un-skew-y:0;
  --un-translate-x:0;
  --un-translate-y:0;
  --un-translate-z:0;
  --un-pan-x: ;
  --un-pan-y: ;
  --un-pinch-zoom: ;
  --un-scroll-snap-strictness:proximity;
  --un-ordinal: ;
  --un-slashed-zero: ;
  --un-numeric-figure: ;
  --un-numeric-spacing: ;
  --un-numeric-fraction: ;
  --un-border-spacing-x:0;
  --un-border-spacing-y:0;
  --un-ring-offset-shadow:0 0 rgba(0,0,0,0);
  --un-ring-shadow:0 0 rgba(0,0,0,0);
  --un-shadow-inset: ;
  --un-shadow:0 0 rgba(0,0,0,0);
  --un-ring-inset: ;
  --un-ring-offset-width:0px;
  --un-ring-offset-color:#fff;
  --un-ring-width:0px;
  --un-ring-color:rgba(147,197,253,.5);
  --un-blur: ;
  --un-brightness: ;
  --un-contrast: ;
  --un-drop-shadow: ;
  --un-grayscale: ;
  --un-hue-rotate: ;
  --un-invert: ;
  --un-saturate: ;
  --un-sepia: ;
  --un-backdrop-blur: ;
  --un-backdrop-brightness: ;
  --un-backdrop-contrast: ;
  --un-backdrop-grayscale: ;
  --un-backdrop-hue-rotate: ;
  --un-backdrop-invert: ;
  --un-backdrop-opacity: ;
  --un-backdrop-saturate: ;
  --un-backdrop-sepia: 
}
::backdrop {
  --un-rotate:0;
  --un-rotate-x:0;
  --un-rotate-y:0;
  --un-rotate-z:0;
  --un-scale-x:1;
  --un-scale-y:1;
  --un-scale-z:1;
  --un-skew-x:0;
  --un-skew-y:0;
  --un-translate-x:0;
  --un-translate-y:0;
  --un-translate-z:0;
  --un-pan-x: ;
  --un-pan-y: ;
  --un-pinch-zoom: ;
  --un-scroll-snap-strictness:proximity;
  --un-ordinal: ;
  --un-slashed-zero: ;
  --un-numeric-figure: ;
  --un-numeric-spacing: ;
  --un-numeric-fraction: ;
  --un-border-spacing-x:0;
  --un-border-spacing-y:0;
  --un-ring-offset-shadow:0 0 rgba(0,0,0,0);
  --un-ring-shadow:0 0 rgba(0,0,0,0);
  --un-shadow-inset: ;
  --un-shadow:0 0 rgba(0,0,0,0);
  --un-ring-inset: ;
  --un-ring-offset-width:0px;
  --un-ring-offset-color:#fff;
  --un-ring-width:0px;
  --un-ring-color:rgba(147,197,253,.5);
  --un-blur: ;
  --un-brightness: ;
  --un-contrast: ;
  --un-drop-shadow: ;
  --un-grayscale: ;
  --un-hue-rotate: ;
  --un-invert: ;
  --un-saturate: ;
  --un-sepia: ;
  --un-backdrop-blur: ;
  --un-backdrop-brightness: ;
  --un-backdrop-contrast: ;
  --un-backdrop-grayscale: ;
  --un-backdrop-hue-rotate: ;
  --un-backdrop-invert: ;
  --un-backdrop-opacity: ;
  --un-backdrop-saturate: ;
  --un-backdrop-sepia: 
}
.container {
  width:100%
}

/* Стили для формы */
.outer-container {
    margin-left: 60px;

}

.pagename{
    font-size: x-large;
    font-weight: bolder;
    text-align: center;
    padding: 30px;
    padding-left: 100px;
}

.link{
    text-align: center;
    padding-left: 70px;
}

a {
    font-weight: 500;
    color: #9eada2;
    text-decoration: inherit;
    transition: 0.3s;
}
a:hover {
    color: #292f2e;
    transition: 0.3s;
}

form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
}

select:focus{
    outline: 0;
    border: 2px solid #8DD3BB;
    transition: 0.2s ease-in-out;
}

p {
    margin-bottom: 15px;
    font-family: 'Arial';

}

option{
    border: 2px solid #D1D1D1;
    width: 430px;
    height: 449.81px;

    transition: 0.2s ease-in-out;
}

label {
    display: block;
    margin-bottom: 5px;
    font-family: 'Arial';
    align-items: center;
}

.checkbox-group {
    display: flex;
    flex-wrap: wrap;
    border: 1px solid #ccc;

    border-radius: 9.96px;
    margin-bottom: 30px;
    padding-top: 30px;
    padding-left: 40px;
    width: 430px;
    max-height: 203px;
    overflow: hidden; /* Hide the scrollbar initially */
    box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
}



.checkbox-row {
    padding-bottom: 10px;
    flex: 0 0 50%;
    margin-bottom: 10px;
    overflow: hidden; /* Prevents the checkbox from affecting subsequent elements */
}

input[type="checkbox"] {

    float: left;
    margin-right: 10px;
}

label {
    display: block;
    overflow: hidden; /* Prevents text from wrapping around checkboxes */
}

input[type="radio"]{
    float: left;
    margin-right: 10px;
    margin-bottom: 5px;
}


.radio-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Horizontally center the items */
    align-items: center; /* Vertically center the items */
    border: 0px solid #ccc;
    padding-left: 10px;
    padding-bottom: 10px;
    padding-top: 10px;
    margin-bottom: 30px;
    border-radius: 9.96px;

    max-height: 270px;
    box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
}
.radio-row {
    padding-top: 7px;
    display: flex;
    flex: 100%; /* Две колонки */
    max-width: 80%;
    align-items: center; /* Выравниваем элементы по вертикали по центру */
    /*border: 1px solid;*/
    border-color: transparent transparent #ccc transparent;
    align-items: center;

}

.checkbox-wrapper {
    flex: 0 0 50%;
    align-items: center;
    padding-bottom: 10px;
    padding-top: 10px;
}

.checkbox-wrapper input {
    margin-top: 0px; /* Расстояние между чекбоксом и текстом */

}

.agree{
    padding-left: 50px;
    text-align: left;
}


.error-message {
    color: red; /* Устанавливаем красный цвет для текста ошибки */
    font-size: small;
    margin-top: 5px;
}

button[type="submit"]:disabled{
    width: 429px;
    height: 48px;
    padding: 8px;
    border:0px;
    border-radius: 22px;
    gap: 4px;
    background-color: #BDCAC6;
    text-color: #112211;
    font-family: 'Arial';
    font-size: 18px;
    font-weight: 600;
    line-height: 22px;
    letter-spacing: 0em;
}

input[type=file]{
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
    width: 430px;
    color: grey;
}

input[type=file]::file-selector-button {
    margin-right: 10px;
    border: 0px;
    background: #8DD3BB;
    padding: 10px 20px;
    border-radius: 5px;
    color: black;
    cursor: pointer;
    transition: background 0.1s ease-in-out;
}

input[type=file]::file-selector-button:hover {
    background: #7FB5B5;
}

button[type="submit"]{
    width: 429px;
    height: 48px;
    padding: 8px;
    border:0px;
    border-radius: 22px;
    gap: 4px;
    background-color: #8DD3BB;
    text-color: #112211;
    font-family: 'Arial';
    font-size: 18px;
    font-weight: 600;
    line-height: 22px;
    letter-spacing: 0em;
    transition: background 0.3s ease-in-out;
}

button[type="submit"]:hover:enabled{
    width: 429px;
    height: 48px;
    padding: 8px;
    border:0px;
    border-radius: 22px;
    gap: 4px;
    background-color: #7FB5B5;
    text-color: #112211;
    font-family: 'Arial';
    font-size: 18px;
    font-weight: 600;
    line-height: 22px;
    letter-spacing: 0em;
    transition: background 0.3s ease-in-out;
}

input[type="text"]{
    border: 2px solid #D1D1D1;
    width: 430px;
    height: 49.81px;
    border-radius: 9.96px;
    font-size: 16px;
    font-weight: 400;
    line-height: 19px;
    letter-spacing: 0em;
    text-align: left;
    padding-left: 20px;
    transition: 0.2s ease-in-out;
    margin-bottom: -20px;
}

#email{
    padding-left: 40px;
}

#password{
    padding-left: 40px;
}

#cpassword{
    padding-left: 40px;
}

#phone{
    padding-left: 40px;
}

input[name="firstName"]{
    margin-bottom: 0px;
}

input[name="surname"]{
    margin-bottom: 0px;
}

input[name="patronymic"]{
    margin-bottom: 0px;
}

select{
    margin-bottom: 0px;
}


input[type="text"]:focus{
    outline: 0;
    border: 2px solid #8DD3BB;
    transition: 0.2s ease-in-out;
}


input[type="password"]{
    border: 2px solid #D1D1D1;
    width: 430px;
    height: 49.81px;
    border-radius: 9.96px;
    font-size: 16px;
    font-weight: 400;
    line-height: 19px;
    letter-spacing: 0em;
    text-align: left;
    padding-left: 40px;
    margin-bottom: -20px;
}

input[type="password"]:focus{
    outline: 0;
    border: 2px solid #8DD3BB;
    transition: 0.2s ease-in-out;
}



#service{
    border: 1px solid #D1D1D1;
    width: 430px;
    height: 49.81px;
    top: 420.89px;
    left: 506px;
    border-radius: 9.96px;
    font-size: 16px;
    font-weight: 400;
    line-height: 19px;
    letter-spacing: 0em;
    text-align: left;
    padding-top: -10px;
}

input[type="checkbox"]{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid #999;
    border-radius: 6px;
    outline: none;
    transition: background-color 0.1s ease-in-out;
}
input[type="checkbox"]:checked::before {
    content: '\2714';
    display: block;
    text-align: center;
    font-size: 16px;
    line-height: 18px;
    color: white;
}

input[type="checkbox"]:checked {
    background-color: #8DD3BB;
    border: 0px;
}

input[type="radio"]{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid #999;
    border-radius: 60px;
    outline: none;
    transition: background-color 0.1s ease-in-out;
}
input[type="radio"]:checked::before {
    content: "\25CF";
    display: block;
    text-align: center;
    font-size: 16px;
    line-height: 18px; /* Adjust this value to center the dot vertically */
    color: white;
}



input[type="radio"]:checked {
    background-color: #8DD3BB;
    border: 0px;
}

i {
    position: relative;
    top: -18px;
    left: 15px;
}

.fa-lock{
    position: relative;
    top: -18px;
    left: 15px;
}

.fa-eye{
    position: relative;
    top: -18px;
    left: 385px;
}

.fa-info-circle {
    position: relative;
    top: -18px;
    left: 395px;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 212px;
    height: 62px;
    background-color: #8DD3BB;
    color: #0e0e0e;
    text-align: left;
    padding: 10px 20px;
    border-radius: 6px;
    margin-top: 15px;
    position: absolute;
    margin-left: 200px;

    opacity: 0;
    transition: opacity 1s;
}



.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

.tooltip .tooltiptext::after {
    content: " ";
    position: absolute;
    bottom: 100%;  /* At the top of the tooltip */
    left: 87%;
    margin-left: -5px;
    border-width: 10px;
    border-style: solid;
    border-color: transparent transparent #8DD3BB transparent;
}
.fa-eye-slash:before {
    content: "\f070"; /* Unicode for the eye-slash icon */
}



</style>
