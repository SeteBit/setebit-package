<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class BolaoDezenaPermissions
{
    public static string $bind = 'bolaodezena';

    const LIST_BIND = ['name' => 'bolaodezena.listar', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_AUDIT = ['name' => 'bolaodezena.listar.auditoria', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_BOLLON = ['name' => 'bolaodezena.listar.bolao', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const LIST_RESULT = ['name' => 'bolaodezena.listar.resultado', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const LIST_TICKET = ['name' => 'bolaodezena.listar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const SHOW_BIND = ['name' => 'bolaodezena.mostrar', 'roles' => [UserLevel::ADMIN->value]];
    const SHOW_BOLLON = ['name' => 'bolaodezena.mostrar.bolao', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const SHOW_TICKET = ['name' => 'bolaodezena.mostrar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const STORE_BIND = ['name' => 'bolaodezena.criar', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_BOLLON = ['name' => 'bolaodezena.criar.bolao', 'roles' => [UserLevel::MANAGER->value]];
    const STORE_RESULT = ['name' => 'bolaodezena.criar.resultado', 'roles' => [UserLevel::MANAGER->value]];
    const STORE_TICKET = ['name' => 'bolaodezena.criar.bilhete', 'roles' => [UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const DESTROY_BIND = ['name' => 'bolaodezena.apagar', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_TICKET = ['name' => 'bolaodezena.apagar.bilhete', 'roles' => [UserLevel::MANAGER->value]];
}