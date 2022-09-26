<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:customer')->get('/customer', function (Request $request) {
    
// });

Route::middleware('auth:customer')->group(function(){
    Route::post('customers/logout', [AuthController::class, 'logout']);
});

Route::post('customers/login', [AuthController::class, 'login']);
Route::post('customers/register', [AuthController::class, 'register']);


Route::apiResource('restaurants', RestaurantController::class);

Route::get('orders/{id}', [OrderController::class, 'show']);