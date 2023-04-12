<?php

namespace Setebit;

readonly final class AuthData
{
    public function __construct(
        private array $headers
    ) {
    }

    public function tenant(): object
    {
        return $this->headers['tenant'] ?? (object)[];
    }

    public function user(): object
    {
        return $this->headers['user'] ?? (object)[];
    }

    public function token(): string
    {
        return $this->headers['token'] ?? '';
    }

    public function permissions(): object
    {
        return $this->headers['permissions'] ?? (object)[];
    }
}
