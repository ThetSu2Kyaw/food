<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function index(){
        $orders = OrderResource::collection(Order::all());
        return $this->successResponse(['orders' => $orders]);
    }

    public function show($id){
        $order = new OrderResource(Order::find($id));
        return $this->successResponse(['order' => $order]);
    }

    public function store(){
        return request()->all();
    }
}
