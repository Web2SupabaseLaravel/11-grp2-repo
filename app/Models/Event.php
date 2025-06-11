<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
}
