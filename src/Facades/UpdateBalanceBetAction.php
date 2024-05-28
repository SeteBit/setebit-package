<?php

namespace Setebit\Package\Facades;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;

/**
 * @method static PromiseInterface|Response created(int $userId, array $data)
 * @method static PromiseInterface|Response cancelled(int $userId, array $data)
 * @method static PromiseInterface|Response won(int $userId, array $data)
 * @method static PromiseInterface|Response adjustment(int $userId, array $data)
 */
class UpdateBalanceBetAction extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Setebit\Package\UpdateBalanceBetAction::class;
    }
}
