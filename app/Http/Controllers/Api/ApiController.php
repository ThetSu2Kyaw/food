<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ApiController extends BaseController
{
    public function index(){
        return OrderResource::collection(Order::all());
    }
}
