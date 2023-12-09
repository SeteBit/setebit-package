<?php

namespace Setebit\Package\Facades;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * Handle updating balance bet action.
 *
 * @method static PromiseInterface|Response handle(int $userId, array $data)
 *
 * @param int $userId User ID.
 * @param array $data Data array with the following structure:
 *      - 'type' (string): Required. Must be 'increment' or 'decrement'.
 *      - 'value' (numeric): Required. The value to increment or decrement.
 *      - 'limit_single_bet' (numeric): Optional. Limit for a single bet.
 *      - 'bet_bonus' (boolean): Required if type is 'increment'. Indicates if bet bonus is applied.
 */
class UpdateBalanceBetAction extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Setebit\Package\UpdateBalanceBetAction::class;
    }
}
