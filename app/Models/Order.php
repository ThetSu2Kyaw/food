<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $with = ['customer', 'restaurant'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
