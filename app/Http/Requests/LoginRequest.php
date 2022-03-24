<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required|min:5'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Senha'
        ];
    }

    public function messages()
    {
        return [
            'email' => 'Digite um :attribute válido',
            'password.min' => ':attribute deve ter no minimo 5 caracteres'
        ];
    }
}
