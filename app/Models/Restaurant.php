<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function township(){
        return $this->belongsTo(Restaurant::class);
    }

    public function menus(){
        return $this->hasMany(Menu::class);
    }

    public function restaurant_categories(){
        return $this->hasMany(RestaurantCategory::class, 'id');
    }
}
