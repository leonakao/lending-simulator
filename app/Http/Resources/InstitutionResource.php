<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class InstitutionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'chave' => Arr::get($this, 'chave'),
            'valor' => Arr::get($this, 'valor'),
        ];
    }
}
