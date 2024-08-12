<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Admin = 'Admin';
    case Reader = 'Reader';
    case Staff = 'Staff';

    public static function values(): array
    {
        return array_map(fn($role) => $role->value, self::cases());
    }
}