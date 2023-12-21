<template>
    <div ref="root" class="flex pt-10px pb-10px cursor-pointer" @click="isOpen = !isOpen">
      <img src="@/assets/img/location.svg" alt="location">
      <span v-if="selectedCity && isCitiesLoad" class="mt-3px ml-3px">{{ selectedCity.name }}</span>
      <span v-else class="mt-3px ml-3px">Волгоград</span>
    </div>
    <transition v-if="isCitiesLoad"
    enter-active-class="transition ease-out duration-200"
    enter-from-class="transition opacity-0 scale-95"
    enter-to-class="transform opacity-100 scale-100"
    leave-active-class="transition ease-in duration-200"
    leave-from-class="transform opacity-100 scale-100"
    leave-to-class="transition opacity-0 scale-95"
    >
      <ul v-show="isOpen" class="city-list round">
        <li v-for="city in cities" :key="city.id" @click="selectCity(city)">{{ city.name }}</li>
      </ul>
    </transition>

    <transition v-else="isCitiesLoad"
    enter-active-class="transition ease-out duration-200"
    enter-from-class="transition opacity-0 scale-95"
    enter-to-class="transform opacity-100 scale-100"
    leave-active-class="transition ease-in duration-200"
    leave-from-class="transform opacity-100 scale-100"
    leave-to-class="transition opacity-0 scale-95"
    >
      <ul v-show="isOpen" class="city-list round">
        <li>
          <div class="flex w-100% justify-center">
            <img src="@/assets/gif/loading.gif" alt="Loading..." width="20" />
          </div>
        </li>
      </ul>
    </transition>
</template>
  

<script setup lang="ts">
import { computed, ref, onMounted } from 'vue';
  
type City = {
  id: number;
  name: string;
};
const cities = ref<City[]>([]);
const isCitiesLoad = ref(false);

const request = new XMLHttpRequest();
  const url = "http://localhost:8000/api/get/cities";
  request.open('GET', url);
  request.setRequestHeader('Content-Type', 'application/json');
  request.addEventListener("readystatechange", () => {
  if (request.readyState === 4 && request.status === 200) {
    const responseData = JSON.parse(request.responseText);
    if (responseData.data && Array.isArray(responseData.data)) {
      cities.value = responseData.data.filter((city: City) => city.id && city.name);
      isCitiesLoad.value = true;
    }
  }
});
request.send();
  
const cityId = ref(1);
const isOpen = ref(false);
const root = ref<HTMLElement | null>(null);
const selectedCity = computed(() => cities.value.find(city => city.id === cityId.value));

const selectCity = (city: { id: number; name: string; }) => {
  cityId.value = city.id;
};

onMounted(() => {
  window.addEventListener('click', event => {
    if (root.value?.outerHTML && !root.value?.contains(event.target as HTMLElement)) {
      isOpen.value = false;
    }
  });
});
</script>


<style scoped>
ul.city-list {
  background: #fff;
  position: absolute;
  padding-inline-start: 0;
  width: 150px;
  border: solid 2px #eeeeee;
  z-index: 998;
}

.city-list > li {
  padding: 10px;
  cursor: pointer;
  transition: 0.25s;
  list-style-type: none;
  border-bottom: solid 2px #eeeeee;
}

.city-list > li:last-child {
  border-bottom: none;
}

.city-list > li:hover {
  background: #eeeeee;
}
</style>