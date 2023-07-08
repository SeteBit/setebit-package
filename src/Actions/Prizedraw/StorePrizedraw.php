<?php

namespace Setebit\Package\Actions\Prizedraw;

use Setebit\Package\Models\Prizedraw;

class StorePrizedraw
{
    public function handle(array $data): Prizedraw
    {
        $prizedraw = Prizedraw::withoutGlobalScope('tenant')->create($data);

        return $prizedraw;
    }
}