<?php

namespace Setebit\Package\Utils;

use http\Client\Curl\User;
use Setebit\Package\Enums\UserLevel;

class TenantPermissions
{
    public static string $bind = 'auth';

    const LIST_BIND = ['name' => 'auth.listar', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_ADMIN = ['name' => 'auth.listar.admin', 'roles' => [UserLevel::MANAGER->value]];
    const LIST_CUSTOMER = ['name' => 'auth.listar.cliente', 'roles' => [UserLevel::MANAGER->value]];
    const LIST_MANAGER = ['name' => 'auth.listar.gerente', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_MODULE = ['name' => 'auth.listar.modulo', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_TENANT = ['name' => 'auth.listar.tenant', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_OPERATOR = ['name' => 'auth.listar.operador', 'roles' => [UserLevel::MANAGER->value]];
    const LIST_USERGROUP = ['name' => 'auth.listar.grupo_usuario', 'roles' => [UserLevel::MANAGER->value]];
    const UPDATE_BIND = ['name' => 'auth.atualizar', 'roles' => [UserLevel::ADMIN]];
    const UPDATE_ADMIN = ['name' => 'auth.atualizar.admin', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_BALANCE = ['name' => 'auth.atualizar.balanco', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_CUSTOMER = ['name' => 'auth.atualizar.cliente', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_USER_PERMISSIONS = ['name' => 'auth.atualizar.permissoes', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_MANAGER = ['name' => 'auth.atualizar.gerente', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_MANAGER_COMMISSION = ['name' => 'auth.atualizar.gerente.comissao', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_OPERATOR = ['name' => 'auth.atualizar.operador', 'roles' => [UserLevel::MANAGER->value]];
    const UPDATE_OPERATOR_COMMISSION = ['name' => 'auth.atualizar.operador.comissao', 'roles' => [UserLevel::MANAGER->value]];
    const UPDATE_OPERATOR_SETTINGS = ['name' => 'auth.atualizar.operador.configuracoes', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const UPDATE_TENANT = ['name' => 'auth.atualizar.tenant', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_TENANT_MODULES = ['name' => 'auth.atualizar.tenant.modulos', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_TENANT_REGULATION = ['name' => 'auth.atualizar.tenant.regulamento', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_TENANT_SETTINGS = ['name' => 'auth.atualizar.tenant.configuracoes', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_USERGROUP = ['name' => 'auth.atualizar.grupo_usuario', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_BIND = ['name' => 'auth.apagar', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_ADMIN = ['name' => 'auth.apagar.admin', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_CUSTOMER = ['name' => 'auth.apagar.cliente', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_MANAGER = ['name' => 'auth.apagar.gerente', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_OPERATOR = ['name' => 'auth.apagar.operador', 'roles' => [UserLevel::MANAGER->value]];
    const DESTROY_TENANT_LOGO = ['name' => 'auth.apagar.tenant.logo', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_BIND = ['name' => 'auth.criar', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_ADMIN = ['name' => 'auth.criar.admin', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_CUSTOMER = ['name' => 'auth.criar.cliente', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_MANAGER = ['name' => 'auth.criar.gerente', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_OPERATOR = ['name' => 'auth.criar.operador', 'roles' => [UserLevel::MANAGER->value]];
    const STORE_TENANT_LOGO = ['name' => 'auth.criar.tenant.logo', 'roles' => [UserLevel::ADMIN->value]];
//    const STORE_TENANT = ['name' => 'auth.criar.tenant', 'roles' => []];
//    const STORE_USERGROUP = ['name' => 'auth.criar.grupo_usuario', 'roles' => []];
}