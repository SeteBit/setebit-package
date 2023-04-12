<?php

namespace Setebit\Facades;

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
        return \Talyssonlima\SetebitPackage\AuthData::class;
    }
}
