<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_datetime',
        'end_datetime',
        'capacity',
        'category',
        'status',
        'organizer_id',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
    ];
    public function organizer()
{
    return $this->belongsTo(app_users::class, 'organizer_id');
}
}
