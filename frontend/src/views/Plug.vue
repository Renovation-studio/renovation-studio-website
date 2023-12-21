<template>
    <main>
        <div class="flex w-100% h-70vh justify-center flex-items-center">
            <div class="container w-700px text-center">
                <span class="font-size-6 font-bold">
                    Ой.. эта страница еще <br> находится в разработке :)
                </span>
                <img class="w-80% mt-2em" src="@/assets/img/plug.png" alt="img" />
                <router-link to="/"><button class="round">На главную</button></router-link>
            </div>
        </div>
    </main>
</template>


<style scoped>
button {
  width: 50%;
  border-style: none;
  font-weight: 550;
  background: #cdeae1;
  padding: 10px 25px;
  border-width: 1px;
  cursor: pointer;
  transition: 0.25s box-shadow;
  margin-top: 2em;
}

button:hover {
  box-shadow: 2px 3px 6px rgba(0, 0, 0, 0.3);
}

@media (min-width: 550px) and (max-width: 768px) {
    .container {
        width: 570px;
    }
}

@media (min-width: 380px) and (max-width: 549px) {
    .container {
        width: 360px;
    }

    .font-size-6 {
        font-size: 1.25rem;
    }
}

@media (max-width: 380px) {
    .container {
        width: 300px;
    }

    .font-size-6 {
        font-size: 1.15rem;
    }
}
</style>