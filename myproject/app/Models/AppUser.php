<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    protected $table = 'app_users';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'age',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false; // Disable timestamps since they’re not in the table
}