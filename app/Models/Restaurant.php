<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    // protected $with = ['menus', 'township'];

    public function township(){
        return $this->belongsTo(Township::class);
    }

    public function menus(){
        return $this->hasMany(Menu::class);
    }

    public function restaurant_category(){
        return $this->belongsTo(RestaurantCategory::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
