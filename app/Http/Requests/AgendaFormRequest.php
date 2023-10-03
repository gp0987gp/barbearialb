<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profissional_id'=>'required|integer',
            'cliente_id'=>'integer',
            'servico_id'=>'integer',
            'data_hora'=>'required|date',
            'tipo_pagamento'=>'max:20|min:3',
            'valor'=>'decimal:2',
        ];
    }

    public function failedValidation(ValidationValidator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages(){
        return [
            'profissional_id.required' => 'O Id do Profissional é Obrigatório' ,
            'profissional_id.integer' => 'O Id é um número inteiro' ,
            
           
            'cliente_id.required' => 'O Id do cliente é obrigatório' ,

           
            'servico_id.required' => 'O Id do serviço é obrigatório' ,

            
            'data_hora.required' => 'O campo data é obrigatório' ,
            'data_hora.date' => 'O campo data é apenas data' ,


           
            'tipo_pagamento.max' => 'O número máximo de caracteres é 20',
            'tipo_pagamento.min' => 'O número mínimo de caracteres é 20',


            'valor.decimal' => 'Informar valores em reais',
           

        ];
    }
}
