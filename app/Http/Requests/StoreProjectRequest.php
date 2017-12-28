<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

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
            'nmprojeto'     => 'required|max:120',
            'idtpprojeto'   => 'required|exists:tpprojeto,id',
            'descricao'     => 'required|max:500',
            'tecnologias'   => 'required',
            'participantes' => 'required',
            'idprioridade'  => 'required|exists:prioridade,id',
            'dtentrega'     => 'date',
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
            'tecnologias.required' => 'É necessário fornecer ao menos uma :attribute',
            'participantes.required' => 'É necessário fornecer ao menos um :attribute',
            'required' => 'O campo :attribute é obrigatório.',
            'exists' => 'O Campo :attribute não foi encontrado na base de dados',
            'max' => 'A quantidade de caracteres do campo :attribute é inválida',
            'date' => 'Informe uma data inváida no campo :attribute'
        ];
    }

    /**
     * Method to get Attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nmprojeto'      => 'Nome',
            'idtpprojeto'    => 'Tipo',
            'descricao'      => 'Descrição',
            'prioridade'     => 'Prioridade',
            'participantes'  => 'Participantes',
            'tecnologias'  => 'Tecnologias',
            'prioridade'     => 'Prioridade',
            'dtentrega'      => 'Data de Entrega',
        ];
    }
}
