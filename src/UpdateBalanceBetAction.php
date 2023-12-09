<?php

namespace Setebit\Package;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class UpdateBalanceBetAction
{
    public function created(int $userId, array $data): PromiseInterface|Response
    {
        return Http::retry(2, 100)
            ->withToken(token())
            ->put(config('setebit-package.url_api_gateway') . "/users/{$userId}/balance/bet-created", $data);
    }

    public function cancelled(int $userId, array $data): PromiseInterface|Response
    {
        return Http::retry(2, 100)
            ->withToken(token())
            ->put(config('setebit-package.url_api_gateway') . "/users/{$userId}/balance/bet-cancelled", $data);
    }

    public function won(int $userId, array $data): PromiseInterface|Response
    {
        return Http::retry(2, 100)
            ->withToken(token())
            ->put(config('setebit-package.url_api_gateway') . "/users/{$userId}/balance/bet-won", $data);
    }
}
