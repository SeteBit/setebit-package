<?php

namespace Setebit\Package;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

readonly final class AuthData
{
    public function __construct(
        private array $headers,
        private Request $request,
    ) {
    }

    public function tenant(): object|null
    {
        if (isset($this->headers['tenant'])) {
            return $this->headers['tenant'];
        }

        $response = Http::get(config('setebit-package.url_api_gateway') . "/tenants", [
            'origin' => $this->request->headers->get('origin'),
        ]);

        if ($response->failed()) {
            return null;
        }

        return $response->object()?->tenant;
    }

    public function user(): object|null
    {
        return $this->headers['user'] ?? null;
    }

    public function token(): string|null
    {
        return $this->headers['token'] ?? null;
    }

    public function permissions(): array|object|null
    {
        return $this->headers['permissions'] ?? null;
    }
}
