import { apiInstance } from './client';

export type RequestTokenData = {
  email: string;
}

export type RequestTokenResponse = {
  token: string;
}

export async function requestResetToken(reqData: RequestTokenData): Promise<RequestTokenResponse> {
  const { data } = await apiInstance.post('password-reset-token', reqData);
  return data;
}

export type ResetPasswordData = {
  token: string;
  newPassword: string;
}

export async function resetPassword(data: ResetPasswordData) {
  return await apiInstance.post('restore-password', data);
}
