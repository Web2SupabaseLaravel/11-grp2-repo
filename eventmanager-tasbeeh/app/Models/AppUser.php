<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class AppUser extends Model
{
    use HasApiTokens;

    protected $table = 'app_users';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['name', 'email', 'password', 'gender', 'age', 'role'];

    public function scopeAttendee($query)
    {
        return $query->where('role', 'Attendee');
    }

    public function scopeOrganizer($query)
    {
        return $query->where('role', 'Organizer');
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', 'Admin');
    }
}