import { ref, computed, onMounted } from 'vue';
import { defineStore } from 'pinia';
import { AxiosError, HttpStatusCode } from 'axios';

import { 
  login as loginAPI, 
  logout as logoutAPI, 
  getProfile as getProfileAPI,
  type LoginData
} from '@/api';

import { type UserProfile } from '@/types';

export const useAuthStore = defineStore('auth', () => {
  const currentUser = ref<UserProfile | null>(null);

  const _isLoading = ref(false);

  const isLoading = computed(() => {
    return _isLoading.value;
  });

  const isAuthorised = computed(() => {
    return !isLoading.value && currentUser.value !== null;
  });

  async function login(data: LoginData) {
    if (_isLoading.value) return;

    _isLoading.value = true;

    try {
      currentUser.value = await loginAPI(data);
    } 
    finally {
      _isLoading.value = false;
    }
  }

  async function logout() {
    if (_isLoading.value) return;
    
    _isLoading.value = true;

    try {
      await logoutAPI();
      currentUser.value = null;
    } 
    finally {
      _isLoading.value = false;
    }
  }

  async function refreshUser() {
    if (_isLoading.value) return;

    _isLoading.value = true;

    try {
      currentUser.value = await getProfileAPI();
    } 
    catch(error) {
      if (
        error instanceof AxiosError && 
        error.status === HttpStatusCode.Unauthorized
      ) {
        currentUser.value = null;
      } else {
        throw error;
      }
    }
    finally {
      _isLoading.value = false;
    }
  }

  onMounted(() => {
    refreshUser()
  })

  return { 
    currentUser,
    isLoading,
    isAuthorised,
    refreshUser,
    login,
    logout 
  }
})
