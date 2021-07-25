<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SimulationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'valor_emprestimo' => 'required|numeric',
            'instituicoes' => 'array',
            'convenios' => 'array',
            'parcela' => 'numeric',
        ];
    }

    public function getData()
    {
        return [
            'lendingValue' => $this->input('valor_emprestimo'),
            'institutions' => $this->input('instituicoes'),
            'agreements' => $this->input('convenios'),
            'installments' => $this->input('parcela'),
        ];
    }
}
