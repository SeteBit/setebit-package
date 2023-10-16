<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class TenantPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'banca';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'banca.listar',
        'roles' => [self::ADMIN]
    ];

    const LIST_AUDIT = [
        'name' => 'banca.listar.auditoria',
        'roles' => [self::ADMIN]
    ];

    const LIST_TENANT_COLOR = [
        'name' => 'banca.listar.cores',
        'roles' => [self::ADMIN]
    ];

    const LIST_TENANT_CONTACTS = [
        'name' => 'banca.listar.contatos',
        'roles' => [self::ADMIN, self::CUSTOMER, self::OPERATOR]
    ];

    const LIST_TENANT_MODULES = [
        'name' => 'banca.listar.módulos',
        'roles' => [self::ADMIN]
    ];

    const LIST_TENANT_SETTINGS = [
        'name' => 'banca.listar.configuração',
        'roles' => [self::ADMIN]
    ];

    const LIST_TENANT_REGULATION = [
        'name' => 'banca.listar.regulamento',
        'roles' => [self::ADMIN, self::OPERATOR, self::CUSTOMER]
    ];

    const LIST_TENANT_PREFERENCES = [
        'name' => 'banca.listar.preferências',
        'roles' => [self::ADMIN]
    ];

    const LIST_TENANT_PAYMENT_INTEGRATION = [
        'name' => 'banca.listar.integração',
        'roles' => [self::ADMIN]
    ];

    const LIST_AD = [
        'name' => 'banca.listar.anúncio',
        'roles' => [self::ADMIN]
    ];


    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'banca.atualizar',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_TENANT_MODULES = [
        'name' => 'banca.atualizar.módulos',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_TENANT_REGULATION = [
        'name' => 'banca.atualizar.regulamento',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_TENANT_SETTINGS = [
        'name' => 'banca.atualizar.configuração',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_TENANT_COLOR = [
        'name' => 'banca.atualizar.cores',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_TENANT_CONTACTS = [
        'name' => 'banca.atualizar.contatos',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_TENANT_PREFERENCES = [
        'name' => 'banca.atualizar.preferências',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_TENANT_LOGO = [
        'name' => 'banca.atualizar.logo',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_TENANT_PAYMENT_INTEGRATION = [
        'name' => 'banca.atualizar.integração',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_AD = [
        'name' => 'banca.atualizar.anúncio',
        'roles' => [self::ADMIN]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'banca.apagar',
        'roles' => [self::ADMIN]
    ];

    const DESTROY_TENANT_LOGO = [
        'name' => 'banca.apagar.logo',
        'roles' => [self::ADMIN]
    ];

    const DESTROY_AD = [
        'name' => 'banca.apagar.anúncio',
        'roles' => [self::ADMIN]
    ];


    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'banca.criar',
        'roles' => [self::ADMIN]
    ];

    const STORE_AD = [
        'name' => 'banca.criar.anúncio',
        'roles' => [self::ADMIN]
    ];
}
