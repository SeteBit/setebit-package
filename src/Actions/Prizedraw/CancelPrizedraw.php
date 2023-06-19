<?php

namespace Setebit\Package\Actions\Prizedraw;

use Setebit\Package\Models\Prizedraw;
use Symfony\Component\HttpFoundation\Response;

class CancelPrizedraw
{
    public function handle(int $id): void
    {
        $prizedraw = Prizedraw::where('external_prizedraw_id', $id)->first();

        if (!$prizedraw) {
            throw new \DomainException(__('prizedraw.not_found'), Response::HTTP_NOT_FOUND);
        }

        $prizedraw->delete();
    }
}