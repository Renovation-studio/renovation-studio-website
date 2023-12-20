import axios from 'axios';
import type { AxiosInstance } from 'axios';

const API_URL = import.meta.env.VITE_API_URL;

const client = axios.create({
  baseURL: API_URL
});

type ApiInstance = Pick<AxiosInstance, 'get' | 'post'>;

export const apiInstance: ApiInstance = {
  get: client.get,
  post: client.post,
};
