<?php

namespace Setebit\Package\Enums;

enum UserLevel: string
{
    case ADMIN = "admin";
    case MANAGER = "manager";
    case OPERATOR = "operator";
    case CUSTOMER = "customer";
}