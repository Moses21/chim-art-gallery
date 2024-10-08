<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_price', 'items','amount', 'status'];


    protected function casts(){
        return [
            'items' => 'json',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
