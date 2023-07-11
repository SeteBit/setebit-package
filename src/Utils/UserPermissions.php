<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class UserPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'financeiro';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'financeiro.listar',
        'roles' => [self::ADMIN]
    ];

    const LIST_FINANCIAL_ENTRY = [
        'name' => 'financeiro.listar.lançamento',
        'roles' => [self::ADMIN]
    ];

    const LIST_CASH_REGISTER = [
        'name' => 'financeiro.listar.caixa',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'financeiro.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_BALANCE = [
        'name' => 'financeiro.atualizar.saldo',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'financeiro.apagar',
        'roles' => [self::ADMIN]
    ];

    const DESTROY_FINANCIAL_ENTRY = [
        'name' => 'financeiro.apagar.lançamento',
        'roles' => [self::ADMIN]
    ];


    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'financeiro.criar',
        'roles' => [self::ADMIN]
    ];

    const STORE_FINANCIAL_ENTRY = [
        'name' => 'financeiro.criar.lançamento',
        'roles' => [self::ADMIN]
    ];
}
