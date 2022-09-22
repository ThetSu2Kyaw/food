<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RestaurantController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/menus', [AdminController::class, 'menus']);

Route::group(['prefix' => 'admin'], function(){
    Route::resource('', AdminController::class);
    Route::resource('menus', MenuController::class);
    Route::post('menus/store', [MenuController::class, 'store']);
    Route::resource('restaurants', RestaurantController::class);
    Route::post('restaurants/store', [RestaurantController::class, 'store']);
    Route::resource('orders', OrderController::class);
});
