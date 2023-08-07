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
        'name' => 'usuário.listar',
        'roles' => [self::ADMIN]
    ];

    const LIST_ADMIN = [
        'name' => 'usuário.listar.admin',
        'roles' => [self::ADMIN]
    ];

    const LIST_CUSTOMER = [
        'name' => 'usuário.listar.cliente',
        'roles' => [self::ADMIN]
    ];

    const LIST_MANAGER = [
        'name' => 'usuário.listar.gerente',
        'roles' => [self::ADMIN]
    ];

    const LIST_OPERATOR = [
        'name' => 'usuário.listar.cambista',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    const LIST_USER_GROUP = [
        'name' => 'usuário.listar.grupo',
        'roles' => [self::ADMIN]
    ];

    const LIST_USER_PERMISSIONS = [
        'name' => 'usuário.listar.permissões',
        'roles' => [self::ADMIN]
    ];

    const LIST_MANAGER_COMMISSION = [
        'name' => 'usuário.listar.gerente.comissão',
        'roles' => [self::ADMIN]
    ];

    const LIST_CUSTOMER_SETTING = [
        'name' => 'usuário.listar.cliente.comissão',
        'roles' => [self::ADMIN]
    ];

    const LIST_CUSTOMER_AFFILIATES = [
        'name' => 'usuário.listar.cliente.afiliados',
        'roles' => [self::ADMIN, self::CUSTOMER]
    ];

    const LIST_OPERATOR_COMMISSION = [
        'name' => 'usuário.listar.cambista.comissão',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    const LIST_OPERATOR_SETTINGS = [
        'name' => 'usuário.listar.cambista.configuração',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    const LIST_REPORT_FINANCIAL_OPERATOR = [
        'name' => 'usuário.listar.cambista.relatório',
        'roles' => [self::OPERATOR]
    ];

    const LIST_INVOICE = [
        'name' => 'usuário.listar.depósito',
        'roles' => [self::ADMIN, self::CUSTOMER]
    ];

    const LIST_WITHDRAWS = [
        'name' => 'usuário.listar.saque',
        'roles' => [self::ADMIN, self::CUSTOMER]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'usuário.atualizar',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_ADMIN = [
        'name' => 'usuário.atualizar.admin',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_BALANCE = [
        'name' => 'usuário.atualizar.saldo',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    const UPDATE_CUSTOMER = [
        'name' => 'usuário.atualizar.cliente',
        'roles' => [self::ADMIN, self::CUSTOMER]
    ];

    const UPDATE_USER_PERMISSIONS = [
        'name' => 'usuário.atualizar.permissões',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_MANAGER = [
        'name' => 'usuário.atualizar.gerente',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_MANAGER_COMMISSION = [
        'name' => 'usuário.atualizar.gerente.comissão',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_CUSTOMER_SETTING = [
        'name' => 'usuário.atualizar.cliente.comissão',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_OPERATOR = [
        'name' => 'usuário.atualizar.cambista',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    const UPDATE_OPERATOR_COMMISSION = [
        'name' => 'usuário.atualizar.cambista.comissão',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    const UPDATE_OPERATOR_SETTINGS = [
        'name' => 'usuário.atualizar.cambista.configuração',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    const UPDATE_USER_GROUP = [
        'name' => 'usuário.atualizar.grupo',
        'roles' => [self::ADMIN]
    ];


    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'usuário.apagar',
        'roles' => [self::ADMIN]
    ];

    const DESTROY_ADMIN = [
        'name' => 'usuário.apagar.admin',
        'roles' => [self::ADMIN]
    ];

    const DESTROY_CUSTOMER = [
        'name' => 'usuário.apagar.cliente',
        'roles' => [self::ADMIN]
    ];

    const DESTROY_MANAGER = [
        'name' => 'usuário.apagar.gerente',
        'roles' => [self::ADMIN]
    ];

    const DESTROY_OPERATOR = [
        'name' => 'usuário.apagar.cambista',
        'roles' => [self::ADMIN]
    ];

    const DESTROY_USER_GROUP = [
        'name' => 'usuário.apagar.grupo',
        'roles' => [self::ADMIN]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'usuário.criar',
        'roles' => [self::ADMIN]
    ];

    const STORE_ADMIN = [
        'name' => 'usuário.criar.admin',
        'roles' => [self::ADMIN]
    ];
    const STORE_MANAGER = [
        'name' => 'usuário.criar.gerente',
        'roles' => [self::ADMIN]
    ];

    const STORE_OPERATOR = [
        'name' => 'usuário.criar.cambista',
        'roles' => [self::ADMIN, self::MANAGER]
    ];

    const STORE_INVOICE = [
        'name' => 'usuário.criar.depósito',
        'roles' => [self::OPERATOR, self::CUSTOMER]
    ];

    const STORE_WITHDRAWS = [
        'name' => 'usuário.criar.saque',
        'roles' => [self::CUSTOMER]
    ];

    const STORE_USER_GROUP = [
        'name' => 'usuário.criar.grupo',
        'roles' => [self::ADMIN]
    ];
}
