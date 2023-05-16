<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class SenaBrasilPermissions
{
    public static string $bind = 'senabrasil';

    const LIST_BIND = ['name' => 'senabrasil.listar', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_AUDIT = ['name' => 'senabrasil.listar.auditoria', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_CONCOURSE = ['name' => 'senabrasil.listar.concurso', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const LIST_RESULT = ['name' => 'senabrasil.listar.resultado', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const LIST_QUOTATION = ['name' => 'senabrasil.listar.cotacao', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const LIST_TICKET = ['name' => 'senabrasil.listar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const SHOW_BIND = ['name' => 'senabrasil.mostrar', 'roles' => [UserLevel::ADMIN->value]];
    const SHOW_CONCOURSE = ['name' => 'senabrasil.mostrar.concurso', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const SHOW_TICKET = ['name' => 'senabrasil.mostrar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const STORE_BIND = ['name' => 'senabrasil.criar', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_RESULT = ['name' => 'senabrasil.criar.resultado', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_TICKET = ['name' => 'senabrasil.criar.bilhete', 'roles' => [UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const UPDATE_BIND = ['name' => 'senabrasil.atualizar', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_CONCOURSE = ['name' => 'senabrasil.atualizar.concurso', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_QUOTATION = ['name' => 'senabrasil.atualizar.cotacao', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_BIND = ['name' => 'senabrasil.apagar', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_TICKET = ['name' => 'senabrasil.apagar.bilhete', 'roles' => [UserLevel::ADMIN->value]];
}
