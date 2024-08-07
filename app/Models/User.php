<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Enums\RoleEnum;
class User extends Authenticatable
{
    protected $fillable = ['first_name', 'last_name', 'dob', 'address', 'phone', 'email', 'password', 'role', 'membership_level'];
    protected function casts(): array
    {
        return [
            'role' => RoleEnum::class,
        ];
    }
    public function borrowTransactions()
    {
        return $this->hasMany(BorrowTransaction::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }

    public function penalties()
    {
        return $this->hasMany(Penalty::class);
    }

    public function membership()
    {
        return $this->hasOne(Membership::class);
    }
}