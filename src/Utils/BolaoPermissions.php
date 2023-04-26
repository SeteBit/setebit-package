<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class BolaoPermissions
{
    public static string $bind = 'bolao';

    const LIST_BIND = ['name' => 'bolao.listar', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_AUDIT = ['name' => 'bolao.listar.auditoria', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_BOLLON = ['name' => 'bolao.listar.bolao', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const LIST_TICKET = ['name' => 'bolao.listar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const STORE_BIND = ['name' => 'bolao.criar', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_BOLLON = ['name' => 'bolao.criar.bolao', 'roles' => [UserLevel::MANAGER->value]];
    const STORE_RESULT = ['name' => 'bolao.criar.resultado', 'roles' => [UserLevel::MANAGER->value]];
    const STORE_TICKET = ['name' => 'bolao.criar.bilhete', 'roles' => [UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const SHOW_BIND = ['name' => 'bolao.mostrar', 'roles' => [UserLevel::ADMIN->value]];
    const SHOW_BOLLON = ['name' => 'bolao.mostrar.bolao', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const SHOW_TICKET = ['name' => 'bolao.mostrar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const UPDATE_BIND = ['name' => 'bolao.atualizar', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_BOLLON = ['name' => 'bolao.atualizar.bolao', 'roles' => [UserLevel::MANAGER->value]];
    const DESTROY_BIND = ['name' => 'bolao.apagar', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_BOLLON = ['name' => 'bolao.apagar.bolao', 'roles' => [UserLevel::MANAGER->value]];
    const DESTROY_TICKET = ['name' => 'bolao.apagar.bilhete', 'roles' => [UserLevel::MANAGER->value]];
}