<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class DoisQuinhentosPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = '2_pra_500';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => '2_pra_500.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => '2_pra_500.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_TICKET = [
        'name' => '2_pra_500.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const LIST_TWOFIVEHUNDRED = [
        'name' => '2_pra_500.listar.2_pra_500',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => '2_pra_500.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => '2_pra_500.criar.resultado',
        'roles' => [self::ADMIN]
    ];
    const STORE_TWOFIVEHUNDRED = [
        'name' => '2_pra_500.criar.2_pra_500',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => '2_pra_500.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TWOFIVEHUNDRED = [
        'name' => '2_pra_500.atualizar.2_pra_500',
        'roles' => [self::ADMIN]
    ];

    /**
     * Validate
     */

    const VALIDATE_TICKET = [
        'name' => '2_pra_500.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];


    /**
     * Cancel
     */

    const CANCEL_TICKET = [
        'name' => '2_pra_500.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => '2_pra_500.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_TWOFIVEHUNDRED = [
        'name' => '2_pra_500.apagar.2_pra_500',
        'roles' => [self::ADMIN]
    ];
}
