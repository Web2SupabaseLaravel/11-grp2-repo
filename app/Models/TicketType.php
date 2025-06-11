<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $table = 'ticket_type'; 
    public $timestamps = false;

    protected $fillable = [
        'name_ticket', 'description', 'price', 'quantity', 'event_id'
    ];
}
