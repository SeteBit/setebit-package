<?php

namespace Setebit\Package\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static object tenant()
 * @method static object user()
 * @method static object token()
 * @method static object permissions()
 */
class AuthData extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Setebit\Package\AuthData::class;
    }
}
