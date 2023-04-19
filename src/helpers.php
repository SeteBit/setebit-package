<?php

use Setebit\Package\Facades\AuthData;

if (!function_exists('tenant')) {
    function tenant(): object|null
    {
        return AuthData::tenant();
    }
}

if (!function_exists('user')) {
    function user(): object|null
    {
        return AuthData::user();
    }
}

if (!function_exists('permissions')) {
    function permissions(): object|null
    {
        return AuthData::permissions();
    }
}

if (!function_exists('token')) {
    function token(): object|null
    {
        return AuthData::token();
    }
}
