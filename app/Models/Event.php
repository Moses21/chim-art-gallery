<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
    ];

    public function ticketTypes()
    {
        return $this->belongsToMany(TicketType::class, 'event_tickets')
                    ->withPivot('price', 'benefits')
                    ->withTimestamps();
    }
}
