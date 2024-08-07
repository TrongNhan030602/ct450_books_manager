<?php

namespace App\Enums;

enum RoleEnum: String
{
    case Admin = 'Admin';
    case Reader = 'Reader';
    case Staff = 'Staff';
}