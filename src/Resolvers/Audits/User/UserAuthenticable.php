<?php

namespace Setebit\Package\Resolvers\Audits\User;

class UserAuthenticable
{
    public function getAuthIdentifier(): int
    {
        return user()->id;
    }

    public function getMorphClass(): string
    {
        return user()->level;
    }
}