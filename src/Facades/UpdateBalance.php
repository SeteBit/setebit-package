<?php

namespace Setebit\Package\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object|null tenant()
 * @method static object|null user()
 * @method static object|null token()
 * @method static array|null permissions()
 */
class UpdateBalance extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Setebit\Package\UpdateBalance::class;
    }
}
