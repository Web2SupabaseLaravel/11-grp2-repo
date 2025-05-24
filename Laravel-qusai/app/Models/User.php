<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 🟢 هذا هو المفتاح: Laravel يستخدم app_users بدل users
    protected $table = 'app_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'age',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // علاقته مع جدول التسجيلات
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'user_id');
    }
}
