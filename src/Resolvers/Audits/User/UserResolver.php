<?php

namespace Setebit\Package\Resolvers\Audits\User;

use Setebit\Package\Resolvers\Audits\User\UserAuthenticable;

class UserResolver implements \OwenIt\Auditing\Contracts\UserResolver
{
    public static function resolve(\OwenIt\Auditing\Contracts\Auditable $auditable): UserAuthenticable
    {
        return new UserAuthenticable();
    }
}