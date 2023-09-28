<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateFormRequest extends FormRequest
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

     // Validação do update
    public function rules(): array
    {
        return [
            'nome'=>'max:80|min:5|unique:servicos,nome,'.$this->id,
            'descricao'=>'max:200|min:10',
            'duracao'=>'numeric',
            'preco'=>'decimal:2',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

        // Mensagens exibidas do update
    public function messages(){
        return [
            'nome.max' => 'Nome deve conter no máximo 80 caracteres',
            'nome.unique' => 'Nome já cadastrado no sistema',
            'nome.unique' => 'O campo deve ser conter no mínimo 5 caracteres',
            'descricao.max' => 'Descrição deve conter no máximo 200 caracteres',
            'descricao.min' => 'Descrição deve conter no mínimo 10 caracteres',
            'descricao.unique' => 'Descrição já cadastrado no sistema',
            'duracao.numeric' => 'O campo deve conter apenas números',
            'preco.decimal' => 'Informar valores em reais',
        ];
    }
}
