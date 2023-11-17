<?php

namespace Setebit\Package\Services;

use Illuminate\Support\Facades\Redis;

class RedisPrizedraw
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Redis::connection(config('setebit-package.redis_prizedraw_connection'));
    }

    public function getUniquePrizedrawNumber(int $prizedrawId): string
    {
        return $this->connection->spop("prizedraw:{$prizedrawId}");
    }
}