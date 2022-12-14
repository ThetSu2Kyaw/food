<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends BaseController
{
    public function index(){
        return $this->successResponse(
             RestaurantResource::collection(Restaurant::with('restaurant_category')->get()));
    }   

    public function show($id){
        $restaurant = Restaurant::with('menus')->where('id', $id)->sole();
        return $this->successResponse([
            "restaurant" => new RestaurantResource($restaurant)
        ]);
    }
}
