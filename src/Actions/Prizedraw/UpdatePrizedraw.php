<?php

namespace Setebit\Package\Actions\Prizedraw;

use Setebit\Package\Models\Prizedraw;

class UpdatePrizedraw
{
    public function handle(int $id, array $data): void
    {
        $prizedraw = Prizedraw::withoutGlobalScope('tenant')
            ->where('external_prizedraw_id', $id)
            ->firstOrFail();

        $prizedraw->update($data);
    }
}
