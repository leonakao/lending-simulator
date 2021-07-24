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
            'valor_emprestimo' => $this->input('valor_emprestimo'),
            'instituicoes' => $this->input('instituicoes'),
            'convenios' => $this->input('convenios'),
            'parcela' => $this->input('parcela'),
        ];
    }
}
