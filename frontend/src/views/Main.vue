<template>


    <div className="about">
        <router-link to="/Register" className="button-link">Зарегестрироваться</router-link>

    </div>
    <p style="justify-content: center;display: flex;">Имя пользователя: {{register.firstName}}</p>
</template>
<style>
@media (min-width: 1024px) {
    .about {
        display: flex;
        justify-content: center; /* Add this line */
    }
}

.button-link {

    padding: 10px 20px;
    font-size: 16px;


    background-color: #7FB5B5;
    color: #fff;


}

</style>
<script>
import  { useRegisterStore } from '../stores/RegisterStore';

export default {
    setup() {
        const register = useRegisterStore();



        return{
            register,

        };
    }
}
</script>
