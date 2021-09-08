<?php

namespace App\Http\Requests\Api\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' => 'required|min:10|max:160',
            'cpf' => "required|min:14|unique:clients",
            'birth' => "required|date|before:-18 years",
            'phone' => "required|min:15",
            'email' => "required|email|unique:users",
            'password'=> "required|min:6|max:10|confirmed",
            'cep' => 'required|min:9',
            'logradouro' => 'required',
            'bairro' => 'required',
            'complemento' => 'nullable',
            'numero' => 'required|integer',
            'localidade' => 'required',
            'uf' => 'required|min:2',

        ];
    }

    public function messages(){

        return [
            'birth.before' => "O campo Data Nasc. acusou sua idade inferior à 18 anos",
            'phone.min' => "O campo Telefone está incompleto",
        ];
    }

    public function attributes()
    {
        return [
            "birth"         => "Data nasc.",
            "logradouro"    => "Rua",
            "localidade"    => "Cidade",
        ];
    }
}
