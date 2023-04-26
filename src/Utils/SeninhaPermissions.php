<?php

namespace Setebit\Package\Utils;

use http\Client\Curl\User;
use Setebit\Package\Enums\UserLevel;

class SeninhaPermissions
{
    public static string $bind = 'seninha';

    const LIST_BIND = ['name' => 'seninha.listar', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_AUDIT = ['name' => 'seninha.listar.auditoria', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_CONCOURSE = ['name' => 'seninha.listar.concurso', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const LIST_RESULT = ['name' => 'seninha.listar.resultado', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const LIST_TICKET = ['name' => 'seninha.listar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const STORE_BIND = ['name' => 'seninha.criar', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_RESULT = ['name' => 'seninha.criar.resultado', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_TICKET = ['name' => 'seninha.criar.bilhete', 'roles' => [UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const SHOW_BIND = ['name' => 'seninha.mostrar', 'roles' => [UserLevel::ADMIN->value]];
    const SHOW_CONCOURSE = ['name' => 'seninha.mostrar.concurso', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value]];
    const SHOW_MODALITY = ['name' => 'seninha.mostrar.modalidade', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const SHOW_TICKET = ['name' => 'seninha.mostrar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const UPDATE_BIND = ['name' => 'seninha.atualizar', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_CONCOURSE = ['name' => 'seninha.atualizar.concurso', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_MODALITY = ['name' => 'seninha.atualizar.modalidade', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_BIND = ['name' => 'seninha.apagar', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_TICKET = ['name' => 'seninha.apagar.bilhete', 'roles' => [UserLevel::ADMIN->value]];
}