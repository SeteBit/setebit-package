<?php

namespace Setebit\Package\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Setebit\Package\Services\RedisPrizedraw;

class PrizedrawResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $prizedraw = $this->resource;

        return [
            'quantity_numbers' => $prizedraw->quantity_numbers,
            'award' => $prizedraw->award_name,
            'description' => $prizedraw->description,
            'draw_at' => $prizedraw->draw_at,
        ];
    }
}
