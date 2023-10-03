<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgendaFormRequest extends FormRequest
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
            'profissionais_id'=>'intereger|required_if:profissional_id,null',
            'cliente_id'=>'intereger',
            'servico_id'=>'intereger',
            'data_hora'=>'date|intereger|required_if:profissional_id,null',
            'tipo_pagamento'=>'max:20|min:3',
            'valor'=>'decimal:2',
        ];
    }
}
