<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditParticipationRequest extends FormRequest
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
            'cargo' => 'required|max:200',
            'deveresdesc' => 'required'
        ];
    }

    /**
     * Get Validation Messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'exists' => 'O Campo :attribute não foi encontrado na base de dados',
            'max' => 'A quantidade de caracteres do campo :attribute é inválida',
            'date' => 'Informe uma data inváida no campo :attribute'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'cargo' => 'Cargo',
            'deveresdesc' => 'Descrição dos Deveres'
        ];
    }
}
