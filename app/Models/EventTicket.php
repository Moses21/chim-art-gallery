<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventTicket extends Pivot
{
    use HasFactory;

    protected $table = 'event_tickets';

    protected $fillable = [
        'event_id',
        'ticket_type_id',
        'price',
        'benefits',
    ];

    protected $casts = [
        'benefits' => 'array', // Cast the benefits field to an array
    ];

}
