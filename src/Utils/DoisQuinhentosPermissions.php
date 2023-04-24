<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class DoisQuinhentosPermissions
{
    public static string $bind = 'doisquinhentos';

    const LIST_BIND = ['name' => 'doisquinhentos.listar', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_AUDIT = ['name' => 'doisquinhentos.listar.auditoria', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_DEDUCTION = ['name' => 'doisquinhentos.listar.desconto', 'roles' => [UserLevel::MANAGER->value]];
    const LIST_RESULT = ['name' => 'doisquinhentos.listar.resultado', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const LIST_TICKET = ['name' => 'doisquinhentos.listar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const LIST_TWOFIVEHUNDRED = ['name' => 'doisquinhentos.listar.doisquinhentos', 'roles' => [UserLevel::MANAGER->value]];
    const SHOW_BIND = ['name' => 'doisquinhentos.mostrar', 'roles' => [UserLevel::ADMIN->value]];
    const SHOW_DEDUCTION = ['name' => 'doisquinhentos.mostrar.desconto', 'roles' => [UserLevel::MANAGER->value]];
    const SHOW_RESULT = ['name' => 'doisquinhentos.mostrar.resultado', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const SHOW_TICKET = ['name' => 'doisquinhentos.mostrar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const SHOW_TWOFIVEHUNDRED = ['name' => 'doisquinhentos.mostrar.doisquinhentos', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const STORE_BIND = ['name' => 'doisquinhentos.criar', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_DEDUCTION = ['name' => 'doisquinhentos.criar.desconto', 'roles' => [UserLevel::MANAGER->value]];
    const STORE_RESULT = ['name' => 'doisquinhentos.criar.resultado', 'roles' => [UserLevel::MANAGER->value]];
    const STORE_TICKET = ['name' => 'doisquinhentos.criar.bilhete', 'roles' => [UserLevel::OPERATOR->value]];
    const STORE_TWOFIVEHUNDRED = ['name' => 'doisquinhentos.criar.doisquinhentos', 'roles' => [UserLevel::MANAGER->value]];
    const UPDATE_BIND = ['name' => 'doisquinhentos.atualizar', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_GUESS = ['name' => 'doisquinhentos.atualizar.palpite', 'roles' => [UserLevel::MANAGER->value]];
    const UPDATE_DEDUCTION = ['name' => 'doisquinhentos.atualizar.desconto', 'roles' => [UserLevel::MANAGER->value]];
    const UPDATE_TICKET = ['name' => 'doisquinhentos.atualizar.bilhete', 'roles' => [UserLevel::MANAGER->value]];
    const UPDATE_TWOFIVEHUNDRED = ['name' => 'doisquinhentos.atualizar.doisquinhentos', 'roles' => [UserLevel::MANAGER->value]];
    const DESTROY_BIND = ['name' => 'doisquinhentos.apagar', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_TICKET = ['name' => 'doisquinhentos.apagar.bilhete', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_DEDUCTION = ['name' => 'doisquinhentos.apagar.desconto', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_TWOFIVEHUNDRED = ['name' => 'doisquinhentos.apagar.doisquinhentos', 'roles' => [UserLevel::ADMIN->value]];
}