<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $with = ['restaurant', 'order_details'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
}
