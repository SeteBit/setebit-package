<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class RifaPermissions
{
    public static string $bind = 'rifa';

    const LIST_BIND = ['name' => 'rifa.listar', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_AUDIT = ['name' => 'rifa.listar.auditoria', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_RAFFLE = ['name' => 'rifa.listar.rifa', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const LIST_RESULT = ['name' => 'rifa.listar.resultado', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const LIST_TICKET = ['name' => 'rifa.listar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    CONST SHOW_BIND = ['name' => 'rifa.mostrar', 'roles' => [UserLevel::ADMIN]];
    const SHOW_RAFFLE = ['name' => 'rifa.mostrar.rifa', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const SHOW_TICKET = ['name' => 'rifa.mostrar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const STORE_BIND = ['name' => 'rifa.criar', 'roles' => [UserLevel::ADMIN]];
    const STORE_RAFFLE = ['name' => 'rifa.criar.rifa', 'roles' => [UserLevel::MANAGER->value]];
    const STORE_RESULT = ['name' => 'rifa.criar.resultado', 'roles' => [UserLevel::MANAGER->value]];
    const STORE_TICKET = ['name' => 'rifa.criar.bilhete', 'roles' => [UserLevel::OPERATOR->value]];
    const UPDATE_BIND = ['name' => 'rifa.atualizar', 'roles' => [UserLevel::ADMIN]];
    const UPDATE_RAFFLE = ['name' => 'rifa.atualizar.rifa', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_BIND = ['name' => 'rifa.apagar', 'roles' => [UserLevel::ADMIN]];
    const DESTROY_TICKET = ['name' => 'rifa.apagar.bilhete', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_RAFFLE = ['name' => 'rifa.apagar.rifa', 'roles' => [UserLevel::ADMIN->value]];
}