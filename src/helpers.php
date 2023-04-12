<?php

use Setebit\Facades\AuthData;

if (!function_exists('tenant')) {
    function tenant(): object
    {
        return AuthData::tenant();
    }
}

if (!function_exists('user')) {
    function user(): object
    {
        return AuthData::user();
    }
}

if (!function_exists('permissions')) {
    function permissions(): object
    {
        return AuthData::permissions();
    }
}

if (!function_exists('token')) {
    function token(): object
    {
        return AuthData::token();
    }
}
