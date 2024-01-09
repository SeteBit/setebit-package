<?php

namespace Setebit\Package\Actions\Prizedraw;

use Setebit\Package\Models\Prizedraw;

class CancelPrizedraw
{
    public function handle(int $id): void
    {
        $prizedraw = Prizedraw::withoutGlobalScope('tenant')
            ->where('external_prizedraw_id', $id)
            ->firstOrFail();

        $prizedraw->delete();
    }
}
