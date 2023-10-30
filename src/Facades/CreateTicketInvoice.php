<?php

namespace Setebit\Package\Facades;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static PromiseInterface|Response handle(array $data)
 */
class CreateTicketInvoice extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Setebit\Package\CreateTicketInvoice::class;
    }
}
