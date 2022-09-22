<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $with = ['restaurant', 'menuCategory'];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function menuCategory(){
        return $this->belongsTo(MenuCategory::class);
    }
}
