<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registration';

    protected $fillable = [
        'user_id',
        'event_id',
        'registration_datetime',
        'status',
    ];

    public $timestamps = false; // ✅ هذا السطر يمنع Laravel من إضافة created_at و updated_at

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
