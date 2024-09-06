<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Items extends Model  implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    // protected $keyType = 'string';

    protected $fillable = ['name','dimensions', 'description', 'price', 'category_id'];

    // protected $appends = ['avatar'];

    // public static function booted(){

    //     static::creating(function ($model) {
    //         $model->id = (string) Str::uuid();
    //     });
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    // public function getAvatarAttribute()
    // {

    //     return $this->getFirstMediaUrl('items');
    // }

}
