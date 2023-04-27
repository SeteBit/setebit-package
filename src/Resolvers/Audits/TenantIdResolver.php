<?php

namespace Setebit\Package\Resolvers\Audits;

use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Resolver;

class TenantIdResolver implements Resolver
{
    public static function resolve(Auditable $auditable): int
    {
        return tenant()->id;
    }
}