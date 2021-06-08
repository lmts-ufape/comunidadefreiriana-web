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
            'telefone' => 'nullable',
            'email' => 'required',
            'site' => 'nullable',
            'info' => 'nullable',
            'coordenador' => 'required',
            'datafundacao' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
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
