@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p>
                    <label for="email">Почта *</label>

                    <input  @input="validateEmail"  type="text" name="email" id="email"  v-model="email" placeholder="Введите почту" />
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </p>
            </div>


            <p class="password-input relative-position">
                <label for="password">Пароль *</label>
                <input
                        id="password"
                        type="password"
                        name="password"
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
            </p>

            <p>
                <label for="phone">Телефон *</label>
                <input type="text" name="phone" id="phone" v-model="phone" placeholder="Введите номер телефона" v-mask="['+# (###) ###-##-##']"/>
                <i class="fa fa-phone" aria-hidden="true"></i>
            </p>

            <p>
                <label for="surname">Фамилия *</label>
                <input type="text" name="surname" id="surname" v-model="surname" placeholder="Введите фамилию" />
            
            </p>

            <p>
                <label for="firstName">Имя *</label>
                <input type="text" name="firstName" id="firstName" v-model="firstName" placeholder="Введите имя" />
           
            </p>

            <p>
                <label for="patronymic">Отчество *</label>
                <input type="text" name="patronymic" id="patronymic" v-model="patronymic" placeholder="Введите отчество" />
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
                <div class="checkbox-row">
                    <input type="checkbox" id="painting" v-model="painting" name="preferable_services[]" value="1"/>
                    <label for="painting">Покраска и обои</label>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" id="tiles" v-model="tiles" name="preferable_services[]" value="2" />
                    <label for="tiles">Плитка и полы</label>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" id="construction" v-model="construction" name="preferable_services[]" value="3" />
                    <label for="construction">Строительство и перепланировка</label>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" id="electricity" v-model="electricity" name="preferable_services[]" value="4" />
                    <label for="electricity">Электрика и освещение</label>
                </div>
            </div>


            <p>
                <label>Какой стиль интерьера вас интересует?</label>
            </p>



            <div class="outer-container">
                <div class="radio-group">
                    <div class="radio-row">
                        <input type="radio" id="modern" name="interior_style" value="1" v-model="interiorStyle" />
                        <label for="modern">Современный</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="classic" name="interior_style" value="2" v-model="interiorStyle" />
                        <label for="classic">Классический</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="eclectic" name="interior_style" value="3" v-model="interiorStyle" />
                        <label for="eclectic">Эклектика</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="minimalism" name="interior_style" value="4" v-model="interiorStyle" />
                        <label for="minimalism">Минимализм</label>
                    </div>
                </div>
            </div>


            <p>
                <label for="photo">Приложите фотографии помещения</label>
                <input type="file" name="photo" id="photo" accept="image/*" @change="handleFileUpload" />
            </p>






                        <!-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-end">{{ __('phoneNumber') }}</label>

                            <div class="col-md-6">
                                <input id="phoneNumber" type="text" class="form-control @error('name') is-invalid @enderror" name="phoneNumber">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="avatarUrl" class="col-md-4 col-form-label text-md-end">{{ __('avatarUrl') }}</label>

                            <div class="col-md-6">
                                <input id="avatarUrl" type="text" class="form-control @error('name') is-invalid @enderror" name="avatarUrl">
                            </div>
                        </div> -->

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
