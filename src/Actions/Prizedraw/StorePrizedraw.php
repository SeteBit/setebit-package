<?php

namespace Setebit\Package\Actions\Prizedraw;

use Setebit\Package\Models\Prizedraw;

class StorePrizedraw
{
    public function handle(array $data): void
    {
        Prizedraw::withoutEvents(fn() => Prizedraw::create($data));
    }
}
