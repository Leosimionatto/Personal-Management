<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'nome' => 'required|max:120',
            'tipo_projeto' => 'required|exists:tpprojeto,id',
            'descricao'    => 'required|max:500',
            'prioridade'  => 'required|exists:prioridades,id',
            'dtentrega'    => 'date',
        ];
    }

    /**
     * Get the messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'exists' => 'O Campo :attribute não foi encontrado na base de dados',
            'max' => 'A quantidade de caracteres do campo :attribute é inválida',
            'date' => 'Informe uma data inváida no campo :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'nome',
            'tipo_projeto' => 'tipo_projeto',
            'descricao'    => 'descricao',
            'prioridade'  => 'prioridade',
            'dtentrega'    => 'dtentrega',
        ];
    }
}
