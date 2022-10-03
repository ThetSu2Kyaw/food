<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends BaseController
{
    public function index(){
        // ->where('customer_id', auth()->user()->id)->get())
        $orders = OrderResource::collection(Order::latest()->with(["restaurant", "order_details"])->where('customer_id', auth()->user()->id)->get());
        return $this->successResponse(['orders' => $orders]);
    }

    public function show($id){
        $order = new OrderResource(Order::find($id));
        return $this->successResponse(['order' => $order]);
    }

    public function store(){

       $order = Order::create([
            'customer_id' => Auth::user()->id,
            'restaurant_id' => request('restaurant_id'),
            'is_finish' => request('is_finish'),
            'remark' => request('remark'),
            'total' => request('total')
       ]);

       $carts = request('carts');
    //    return $carts[0]->menu_id;
       foreach($carts as $cart){
        $order_details =  OrderDetail::create([
            'menu_id' => $cart['menu_id'],
            'order_id' => $order->id,
            'quantity' => $cart['qty'],
            'remark' => 'something'
         ]);
       }

       return $this->successResponse(['order' => $order, 'order_details' => $order_details]);
    }
}
