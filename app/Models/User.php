<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role'
    ];

    // To ensure passwords are always hashed
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Auto-hashing the password before saving
    public static function boot()
    {
        parent::boot();

        static::saving(function ($user) {
            if ($user->isDirty('password')) {
                $user->password = bcrypt($user->password);
            }
        });
    }
}
