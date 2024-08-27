<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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

    public function getPosterUrlAttribute()
    {
        return $this->getFirstMediaUrl('poster');
    }
}
