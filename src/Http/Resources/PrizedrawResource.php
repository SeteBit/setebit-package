<?php

namespace Setebit\Package\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrizedrawResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'award' => $this->award_name,
            'description' => $this->description,
            'draw_at' => $this->draw_at
        ];
    }
}
