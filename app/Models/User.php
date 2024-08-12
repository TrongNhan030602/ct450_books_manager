<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Enums\MembershipLevelEnum;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['first_name', 'last_name', 'dob', 'address', 'phone', 'email', 'password', 'role', 'membership_level'];
    protected $casts = [
        'role' => RoleEnum::class,
        'membership_level' => MembershipLevelEnum::class,
    ];

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
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}