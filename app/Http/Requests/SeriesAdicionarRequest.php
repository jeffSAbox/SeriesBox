<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesAdicionarRequest extends FormRequest
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
            'nome' => 'required|min:3'
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome'
        ];
    }

    public function messages()
    {
        return [
            'required' => "O campo :attribute é obrigatório",
            'nome.min' => "Nome deve ter no minimo 3 caracteres"
        ];
    }
}
