<?php

namespace Setebit\Package;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class UpdateBalance
{
    public function handle(int $userId, array $data): PromiseInterface|Response
    {
        return Http::retry(2, 100)
            ->put(config('setebit-package.url_api_gateway') . "/users/{$userId}/balance", $data);
    }
}
