<?php

namespace Setebit\Package;

readonly final class AuthData
{
    public function __construct(
        private array $headers
    ) {
    }

    public function tenant(): object|null
    {
        return $this->headers['tenant'] ?? null;
    }

    public function user(): object|null
    {
        return $this->headers['user'] ?? null;
    }

    public function token(): string|null
    {
        return $this->headers['token'] ?? null;
    }

    public function permissions(): object|null
    {
        return $this->headers['permissions'] ?? null;
    }
}
