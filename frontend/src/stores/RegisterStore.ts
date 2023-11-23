import { defineStore } from 'pinia';
import {ref, watch} from "vue";

export const useRegisterStore = defineStore('register', () => {
    const  uploadedFile= ref('');
    const email= ref('');
    const password= ref('');
    const   confirmPassword= ref('');
    const phone= ref('');
    const   surname= ref('');
    const  firstName= ref('');
    const   patronymic= ref('');
    const  movie= ref('');
    const  wishes= ref('');
    const  interiorStyle= ref('');
    const  painting= ref(false);
    const   tiles= ref(false);
    const  construction= ref(false);
    const  electricity= ref(false);
    const  agreement= ref(false);



    const userDataInLocalStorage = localStorage.getItem("userData");
    if (userDataInLocalStorage) {
        const parsedData = JSON.parse(userDataInLocalStorage);
        email.value = parsedData.email;
        surname.value = parsedData.surname;
        firstName.value = parsedData.firstName;
    }




    const setUploadedFile = (file: string) => {
        uploadedFile.value = file;
    };
    const setEmail = (newEmail: string) => {
        email.value  = newEmail;
    };

    const setPassword = (newPassword: string) => {
        password.value  = newPassword;
    };

    const setConfirmPassword = (newConfirmPassword: string) => {
        confirmPassword.value  = newConfirmPassword;
    };

    const setPhone = (newPhone: string) => {
        phone.value  = newPhone;
    };

    const setSurname = (newSurname: string) => {
        surname.value  = newSurname;
    };

    const setFirstName = (newFirstName: string) => {
        firstName.value  = newFirstName;
    };

    const setPatronymic = (newPatronymic: string) => {
        patronymic.value  = newPatronymic;
    };

    const setMovie = (newMovie: string) => {
        movie.value  = newMovie;
    };

    const setWishes = (newWishes: string) => {
        wishes.value  = newWishes;
    };

    const setInteriorStyle = (newInteriorStyle: string) => {
        interiorStyle.value  = newInteriorStyle;
    };

    const setPainting = (newValue: boolean) => {
       painting.value  = newValue;
    };

    const setTiles = (newValue: boolean) => {
        tiles.value  = newValue;
    };

    const setConstruction = (newValue: boolean) => {
        construction.value  = newValue;
    };

    const setElectricity = (newValue: boolean) => {
        electricity.value  = newValue;
    };

    const setAgreement = (newValue: boolean) => {
        agreement.value  = newValue;
    };


    watch(
        () => ({ email: email.value, surname: surname.value, firstName: firstName.value }),
        (state) => {
            localStorage.setItem("userData", JSON.stringify(state));
        },
        { deep: true }
    );



    return {
        setEmail,
        setPassword,
        setConfirmPassword,
        setPhone,
        setSurname,
        setFirstName,
        setPatronymic,
        setMovie,
        setWishes,
        setInteriorStyle,
        setPainting,
        setTiles,
        setConstruction,
        setElectricity,
        setAgreement,
        setUploadedFile,
        surname,
        firstName,
        patronymic,
        email,
        movie,
        password,
        confirmPassword,
        phone,
        wishes,
        interiorStyle,
        agreement,
        painting,
        tiles,
        construction,
        electricity,
        uploadedFile,
    };
});
