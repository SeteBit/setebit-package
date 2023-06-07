<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class TenantPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'auth';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'auth.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_ADMIN = [
        'name' => 'auth.listar.admin',
        'roles' => [self::ADMIN]
    ];
    const LIST_CUSTOMER = [
        'name' => 'auth.listar.cliente',
        'roles' => [self::ADMIN]
    ];
    const LIST_MANAGER = [
        'name' => 'auth.listar.gerente',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'auth.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_USER_PERMISSIONS = [
        'name' => 'auth.listar.permissoes',
        'roles' => [self::ADMIN]
    ];
    const LIST_OPERATOR = [
        'name' => 'auth.listar.operador',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_USER_GROUP = [
        'name' => 'auth.listar.grupo',
        'roles' => [self::ADMIN]
    ];
    const LIST_MANAGER_COMMISSION = [
        'name' => 'auth.listar.gerente.comissao',
        'roles' => [self::ADMIN]
    ];
    const LIST_OPERATOR_COMMISSION = [
        'name' => 'auth.listar.operador.comissao',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_OPERATOR_SETTINGS = [
        'name' => 'auth.listar.operador.configuracoes',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_TENANT_COLORS = [
        'name' => 'auth.listar.tenant.cores',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_MODULES = [
        'name' => 'auth.listar.tenant.modulos',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_SETTINGS = [
        'name' => 'auth.listar.tenant.configuracoes',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_REGULATION = [
        'name' => 'auth.listar.tenant.regulamento',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_LOGO = [
        'name' => 'auth.listar.tenant.logo',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_PREFERENCES = [
        'name' => 'auth.listar.tenant.preferencias',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_PAYMENT_INTEGRATION = [
        'name' => 'auth.listar.tenant.integracao',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'auth.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_ADMIN = [
        'name' => 'auth.atualizar.admin',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_BALANCE = [
        'name' => 'auth.atualizar.balanco',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const UPDATE_CUSTOMER = [
        'name' => 'auth.atualizar.cliente',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_USER_PERMISSIONS = [
        'name' => 'auth.atualizar.permissoes',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_MANAGER = [
        'name' => 'auth.atualizar.gerente',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_MANAGER_COMMISSION = [
        'name' => 'auth.atualizar.gerente.comissao',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_OPERATOR = [
        'name' => 'auth.atualizar.operador',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const UPDATE_OPERATOR_COMMISSION = [
        'name' => 'auth.atualizar.operador.comissao',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const UPDATE_OPERATOR_SETTINGS = [
        'name' => 'auth.atualizar.operador.configuracoes',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const UPDATE_TENANT_MODULES = [
        'name' => 'auth.atualizar.tenant.modulos',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_REGULATION = [
        'name' => 'auth.atualizar.tenant.regulamento',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_SETTINGS = [
        'name' => 'auth.atualizar.tenant.configuracoes',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_COLORS = [
        'name' => 'auth.atualizar.tenant.cores',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_PREFERENCES = [
        'name' => 'auth.atualizar.tenant.preferencias',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_LOGO = [
        'name' => 'auth.atualizar.tenant.logo',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_PAYMENT_INTEGRATION = [
        'name' => 'auth.atualizar.tenant.integracao',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_USER_GROUP = [
        'name' => 'auth.atualizar.grupo',
        'roles' => [self::ADMIN]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'auth.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_ADMIN = [
        'name' => 'auth.apagar.admin',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_CUSTOMER = [
        'name' => 'auth.apagar.cliente',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_MANAGER = [
        'name' => 'auth.apagar.gerente',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_OPERATOR = [
        'name' => 'auth.apagar.operador',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_TENANT_LOGO = [
        'name' => 'auth.apagar.tenant.logo',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_USER_GROUP = [
        'name' => 'auth.apagar.grupo',
        'roles' => [self::ADMIN]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'auth.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_ADMIN = [
        'name' => 'auth.criar.admin',
        'roles' => [self::ADMIN]
    ];
    const STORE_MANAGER = [
        'name' => 'auth.criar.gerente',
        'roles' => [self::ADMIN]
    ];
    const STORE_OPERATOR = [
        'name' => 'auth.criar.operador',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const STORE_INVOICE = [
        'name' => 'auth.criar.fatura',
        'roles' => [self::OPERATOR, self::MANAGER]
    ];
    const STORE_WITHDRAWS = [
        'name' => 'auth.criar.saque',
        'roles' => [self::MANAGER]
    ];
    const STORE_USER_GROUP = [
        'name' => 'auth.criar.grupo',
        'roles' => [self::ADMIN]
    ];
}
