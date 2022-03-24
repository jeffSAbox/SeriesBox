<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginCadastrarRequest extends FormRequest
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
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'email' => 'E-mail',
            'password' => 'Senha'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'O :attribute deve ter no minimo 5 caracteres',
            'email.email' => 'Digite um :attribute válido',
            'password.min' => ':attribute deve ter no minimo 5 caracteres'
        ];
    }
}
