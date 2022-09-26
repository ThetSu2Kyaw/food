<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $with = ["menu"];

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
