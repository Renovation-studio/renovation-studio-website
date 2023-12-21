import { apiInstance } from './client';
import { type UserProfile } from '@/types';

export type LoginData = {
  phoneNumber?: string;
  email?: string;
  password: string;
};

export async function login(loginData: LoginData): Promise<UserProfile> {
  const { data } = await apiInstance.post('login', loginData);
  return data;
}

export async function logout() {
  return await apiInstance.post('logout');
}

export async function getProfile(): Promise<UserProfile> {
  const { data } = await apiInstance.get('profile');
  return data;
}

export async function register(formData: FormData) {
  await apiInstance.post('register', formData, {
    headers: {
      'Content-Type': 'multipart/form-data', // Указываем тип контента как форма с файлами
    },
  });
}


export async function checkEmail(data: { email: string }) {
  const response = await apiInstance.post('check-email', data);
  return response;
}

export async function checkPhone(data: { phone: string }) {
  try {
    const response = await apiInstance.post('check-phone', data);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
}