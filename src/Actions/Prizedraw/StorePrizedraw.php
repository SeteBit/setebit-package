<?php

namespace Setebit\Package\Actions\Prizedraw;

use Setebit\Package\Models\Prizedraw;

class StorePrizedraw
{
    public function handle(array $data): Prizedraw
    {
        $prizedraw = Prizedraw::withoutEvents(function () use ($data) {
            return Prizedraw::create($data);
        });

        return $prizedraw;
    }
}