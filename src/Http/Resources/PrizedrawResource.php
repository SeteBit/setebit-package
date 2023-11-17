<?php

namespace Setebit\Package\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Setebit\Package\Services\RedisPrizedraw;

class PrizedrawResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'quantity_numbers' => $this->quantity_numbers,
            'code' => RedisPrizedraw::getUniquePrizedrawNumber($this->external_prizedraw_id),
            'award' => $this->award_name,
            'description' => $this->description,
            'draw_at' => $this->draw_at,
        ];
    }
}
