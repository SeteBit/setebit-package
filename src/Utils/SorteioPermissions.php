<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class SorteioPermissions
{
    public static string $bind = 'sorteio';

    const LIST_BIND = ['name' => 'sorteio.listar', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_PRIZEDRAW = ['name' => 'sorteio.listar.sorteio', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_LISTAWARD = ['name' => 'sorteio.listar.premio', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_BIND = ['name' => 'sorteio.criar', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_PRIZEDRAW = ['name' => 'sorteio.criar.sorteio', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_AWARD = ['name' => 'sorteio.criar.premio', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_BIND = ['name' => 'sorteio.atualizar', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_PRIZEDRAW = ['name' => 'sorteio.atualizar.sorteio', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_AWARD = ['name' => 'sorteio.atualizar.premio', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_BIND = ['name' => 'sorteio.apagar', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_PRIZEDRAW = ['name' => 'sorteio.apagar.sorteio', 'roles' => [UserLevel::ADMIN->value]];
    const SHOW_BIND = ['name' => 'sorteio.mostrar', 'roles' => [UserLevel::ADMIN->value]];
    const SHOW_PRIZEDRAW = ['name' => 'sorteio.mostrar.sorteio', 'roles' => [UserLevel::ADMIN->value]];
    const SHOW_AWARD = ['name' => 'sorteio.mostrar.premio', 'roles' => [UserLevel::ADMIN->value]];
}