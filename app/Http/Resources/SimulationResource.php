<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SimulationResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->map(function ($item) {
            return [
                'taxa' => $item->taxaJuros,
                'parcelas' => $item->parcelas,
                'valor_parcela' => $item->valor_parcela,
                'convenio' => $item->convenio,
            ];
        });
    }
}
