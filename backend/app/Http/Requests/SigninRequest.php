<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phoneNumber' => 'bail|required_without:email|digits:11',
            'email' => 'bail|required_without:phoneNumber|email:rfc,dns',
            'password' => 'required|string',
        ];
    }
}
