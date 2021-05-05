<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstituicao extends FormRequest
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
            'nome' => 'required',
            'categoria' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'endereco' => 'required',
            'cep' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'site' => 'required',
            'coordenador' => 'required',
            'datafundacao' => 'required',
            'DatadeRealizacao' => 'required',
            'NomedaRealizacao' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'autorizado' => 'required',
            'confirmacaoEmail' => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'O atributo :attribute é obrigatório',

        ];
    }
}
