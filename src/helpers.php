<?php

use Setebit\Package\Facades\AuthData;
use Setebit\Package\WildcardPermission;

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

if (!function_exists('uniqueTicketCode')) {
    function uniqueTicketCode(string $suffix): string
    {
        $code = strtoupper(substr(uniqid(), 1, 13));
        return $code . $suffix;
    }
}

if (!function_exists('hasPermission')) {
    function hasPermission(array $permission): bool
    {
        $permissionName = $permission['name'];

        foreach (AuthData::permissions() as $userPermission) {
            $wildcardPermission = new WildcardPermission($userPermission);

            if ($wildcardPermission->implies($permissionName)) {
                return true;
            }
        }

        return false;
    }
}
