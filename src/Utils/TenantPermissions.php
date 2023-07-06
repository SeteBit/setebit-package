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
    const LIST_ADMIN = [
        'name' => 'banca.listar.admin',
        'roles' => [self::ADMIN]
    ];
    const LIST_CUSTOMER = [
        'name' => 'banca.listar.cliente',
        'roles' => [self::ADMIN]
    ];
    const LIST_MANAGER = [
        'name' => 'banca.listar.gerente',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'banca.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_FINANCIAL_ENTRY = [
        'name' => 'banca.listar.financeiro.lançamento',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_USER_PERMISSIONS = [
        'name' => 'banca.listar.permissões',
        'roles' => [self::ADMIN]
    ];
    const LIST_OPERATOR = [
        'name' => 'banca.listar.cambista',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_USER_GROUP = [
        'name' => 'banca.listar.grupo',
        'roles' => [self::ADMIN]
    ];
    const LIST_MANAGER_COMMISSION = [
        'name' => 'banca.listar.gerente.comissão',
        'roles' => [self::ADMIN]
    ];
    const LIST_CUSTOMER_COMMISSION = [
        'name' => 'banca.listar.cliente.comissão',
        'roles' => [self::ADMIN]
    ];
    const LIST_CUSTOMER_AFFILIATES = [
        'name' => 'banca.listar.cliente.afiliados',
        'roles' => [self::ADMIN, self::CUSTOMER]
    ];
    const LIST_OPERATOR_COMMISSION = [
        'name' => 'banca.listar.cambista.comissão',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_OPERATOR_SETTINGS = [
        'name' => 'banca.listar.cambista.configuração',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_REPORT_FINANCIAL_OPERATOR = [
        'name' => 'banca.listar.cambista.relatório',
        'roles' => [self::OPERATOR]
    ];
    const LIST_TENANT_COLOR = [
        'name' => 'banca.listar.banca.cores',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_CONTACTS = [
        'name' => 'banca.listar.banca.contatos',
        'roles' => [self::CUSTOMER]
    ];
    const LIST_TENANT_MODULES = [
        'name' => 'banca.listar.banca.módulos',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_SETTINGS = [
        'name' => 'banca.listar.banca.configuração',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_REGULATION = [
        'name' => 'banca.listar.banca.regulamento',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_PREFERENCES = [
        'name' => 'banca.listar.banca.preferências',
        'roles' => [self::ADMIN]
    ];
    const LIST_TENANT_PAYMENT_INTEGRATION = [
        'name' => 'banca.listar.banca.integração',
        'roles' => [self::ADMIN]
    ];
    const LIST_INVOICE = [
        'name' => 'banca.listar.depósito',
        'roles' => [self::ADMIN, self::CUSTOMER]
    ];
    const LIST_WITHDRAWS = [
        'name' => 'banca.listar.saque',
        'roles' => [self::ADMIN, self::CUSTOMER]
    ];
    const LIST_CASH_REGISTER = [
        'name' => 'banca.listar.caixa',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_REPORT_FINANCIAL_TENANT_ONLINE = [
        'name' => 'banca.listar.banca.relatório.online',
        'roles' => [self::ADMIN]
    ];
    const LIST_REPORT_FINANCIAL_TENANT_ONSITE = [
        'name' => 'banca.listar.banca.relatório.presencial',
        'roles' => [self::ADMIN, self::MANAGER]
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
    const UPDATE_ADMIN = [
        'name' => 'banca.atualizar.admin',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_BALANCE = [
        'name' => 'banca.atualizar.saldo',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const UPDATE_CUSTOMER = [
        'name' => 'banca.atualizar.cliente',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_USER_PERMISSIONS = [
        'name' => 'banca.atualizar.permissões',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_MANAGER = [
        'name' => 'banca.atualizar.gerente',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_MANAGER_COMMISSION = [
        'name' => 'banca.atualizar.gerente.comissão',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_CUSTOMER_COMMISSION = [
        'name' => 'banca.atualizar.cliente.comissão',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_OPERATOR = [
        'name' => 'banca.atualizar.cambista',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const UPDATE_OPERATOR_COMMISSION = [
        'name' => 'banca.atualizar.cambista.comissão',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const UPDATE_OPERATOR_SETTINGS = [
        'name' => 'banca.atualizar.cambista.configuração',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const UPDATE_TENANT_MODULES = [
        'name' => 'banca.atualizar.banca.módulos',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_REGULATION = [
        'name' => 'banca.atualizar.banca.regulamento',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_SETTINGS = [
        'name' => 'banca.atualizar.banca.configuração',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_COLOR = [
        'name' => 'banca.atualizar.banca.cores',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_CONTACTS = [
        'name' => 'banca.atualizar.banca.contatos',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_PREFERENCES = [
        'name' => 'banca.atualizar.banca.preferências',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_LOGO = [
        'name' => 'banca.atualizar.banca.logo',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_PAYMENT_INTEGRATION = [
        'name' => 'banca.atualizar.banca.integração',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_USER_GROUP = [
        'name' => 'banca.atualizar.grupo',
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
    const DESTROY_ADMIN = [
        'name' => 'banca.apagar.admin',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_CUSTOMER = [
        'name' => 'banca.apagar.cliente',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_MANAGER = [
        'name' => 'banca.apagar.gerente',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_OPERATOR = [
        'name' => 'banca.apagar.cambista',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_TENANT_LOGO = [
        'name' => 'banca.apagar.banca.logo',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_USER_GROUP = [
        'name' => 'banca.apagar.grupo',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_FINANCIAL_ENTRY = [
        'name' => 'banca.apagar.financeiro.lançamento',
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
    const STORE_ADMIN = [
        'name' => 'banca.criar.admin',
        'roles' => [self::ADMIN]
    ];
    const STORE_MANAGER = [
        'name' => 'banca.criar.gerente',
        'roles' => [self::ADMIN]
    ];
    const STORE_OPERATOR = [
        'name' => 'banca.criar.cambista',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const STORE_INVOICE = [
        'name' => 'banca.criar.depósito',
        'roles' => [self::OPERATOR, self::CUSTOMER]
    ];
    const STORE_WITHDRAWS = [
        'name' => 'banca.criar.saque',
        'roles' => [self::CUSTOMER]
    ];
    const STORE_USER_GROUP = [
        'name' => 'banca.criar.grupo',
        'roles' => [self::ADMIN]
    ];
    const STORE_FINANCIAL_ENTRY = [
        'name' => 'banca.criar.financeiro.lançamento',
        'roles' => [self::ADMIN]
    ];
    const STORE_AD = [
        'name' => 'banca.criar.anúncio',
        'roles' => [self::ADMIN]
    ];
}
