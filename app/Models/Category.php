<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['name', 'description'];
    // protected $appends = ['avatar'];

    public function items()
    {
        return $this->hasMany(Items::class);
    }



    public function getAvatarAttribute()
    {
        return $this->getFirstMediaUrl('category');
    }




}
