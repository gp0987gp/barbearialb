<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:120|min:5',
            'celular' =>'required|max:11|min:10',
            'e-mail'=>'required|max:120|email:rfc,dns||unique:clientes,cpf',
            'cpf'=>'required|max:11|min:11|unique:clientes,nome',
            'dataNascimento'=>'required|',
            'cidade'=>'required|max:120',
            'estado'=>'required|max:2|min:2',
            'pais'=>'required|max:80',
            'rua'=>'required|max:120',
            'numero'=>'required|max:10',
            'bairro'=>'required|max:100',
            'cep'=>'required|max:8|min:8',
            'complemento'=>'max:150',
            'senha' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function message(){
        return [
            'nome.required' => 'Nome Obrigatório' ,
            'nome.max' => 'Nome deve conter no máximo 120 caracteres',
            'nome.min' => 'Nome deve conter no mínimo 5 caracteres',
        
            'celular.required' => 'Número de Celular Obrigatório' ,
            'celular.max' => 'Deve conter no máximo 11 caracteres',
            'celular.min' => 'Deve conter no mínimo 10 caracteres',

            'e-mail.required' => 'E-mail Obrigatório',
            'e-mail.max' => 'Deve conter no maxímo 120 caracteres',
            'e-mail.email' => 'formato de email inválido',
            'e-mail.unique' => 'E-mail já cadastrado no sistema',


            'cpf.required' => 'Número de Celular Obrigatório' ,
            'cpf.max' => 'Deve conter no máximo 11 caracteres',
            'cpf.min' => 'Deve conter no mínimo 10 caracteres',
            'cpf.unique' => 'CPF já cadastrado no sistema',


            'dataNascimento.required' => 'A data de nascimento é obrigatória',

            'cidade.required' => 'A cidade é obrigatória',
            'cidade.max' => 'O campo deve conter no máximo 120 caracteres' ,

            'estado.required' => 'Estado Obrigatório',
            'estado.max' => 'O campo deve conter no máximo 2 caracteres',
            'estado.min' => 'O campo deve conter no mínimo 2 caracteres',

            'pais.required' => 'O campo país é obrigatório',
            'pais.max' =>'O campo deve conter no máximo 80 caracteres',

            'rua.required' => 'O campo rua é obrigatório',
            'rua.max' =>'O campo deve conter no máximo 120 caracteres',

            'numero.required' => 'O campo número é obrigatório',
            'numero.max' =>'O campo deve conter no máximo 10 caracteres',

            'bairro.required' => 'O campo bairro é obrigatório',
            'bairro.max' =>'O campo deve conter no máximo 100 caracteres',

            'cep.required' => 'O campo cep é obrigatório',
            'cep.max' =>'O campo deve conter no máximo 8 caracteres',
            'cep.min' =>'O campo deve conter no mínimo 8 caracteres',

            'complemento.max' => 'O campo deve conter no máximo 150 caracteres',

            'senha.required' => 'O campo senha é obrigatório'

        ];
    }
}
