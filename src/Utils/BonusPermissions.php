<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class BonusPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'bônus';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'bônus.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_BONUS = [
        'name' => 'bônus.listar.bônus',
        'roles' => [self::ADMIN]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'bônus.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_BONUS = [
        'name' => 'bônus.criar.bônus',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'bônus.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_BONUS = [
        'name' => 'bônus.atualizar.bônus',
        'roles' => [self::ADMIN]
    ];


    /**
     * Convert
     */

    const CONVERT_BONUS = [
        'name' => 'bônus.converter',
        'roles' => [self::CUSTOMER]
    ];
}
