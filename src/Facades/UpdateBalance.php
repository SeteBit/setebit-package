<?php

namespace Setebit\Package\Facades;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static PromiseInterface|Response handle()
 */
class UpdateBalance extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Setebit\Package\UpdateBalance::class;
    }
}
