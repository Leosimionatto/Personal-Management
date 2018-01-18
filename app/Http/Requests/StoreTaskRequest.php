<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreTaskRequest extends FormRequest
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
     * @param $request
     * @return array
     */
    public function rules(Request $request)
    {
        Validator::extend('not_empty_array', function($attribute) use ($request){
            foreach($request->get($attribute) as $item){
                foreach($item as $value){
                    if(empty($value)){
                        return false;
                    }
                }
            }

            return true;
        });

        $request->merge(['etapas' => json_decode($request->get('etapas'))]);

        return [
            'nmtarefa'       => 'required|max:200',
            'descricao'      => 'required',
            'idprioridade'   => 'required|exists:prioridade,id',
            'idparticipante' => 'required|exists:participante,id',
            'idprojeto'      => 'required|exists:projeto,id',
            'etapas'         => 'not_empty_array'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'required'  => 'O campo :attribute é obrigatório.',
            'max'       => 'O campo :attribute extrapolou o número máximo de caracteres permitido.',
            'exists'    => 'O campo :attribute informado não existe.',
            'date'      => 'O campo :attribute deve conter uma data válida.',
            'not_empty_array' => 'Existem :attribute com informações incompletas.'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'nmtarefa'       => 'Nome da Tarefa',
            'descricao'      => 'Descrição da Tarefa',
            'idprioridade'   => 'Prioridade da Tarefa',
            'idparticipante' => 'Participante',
            'idprojeto'      => 'Projeto',
            'etapas'         => 'Etapas'
        ];
    }
}
