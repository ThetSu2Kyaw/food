<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Backend\AddAdminController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\RestaurantController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', [OrderController::class, 'index']);

Route::get('/admin', function(){
    return view("backend.admin.index");
});

Route::post('/admin', [AuthController::class, 'create']);

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function(){
    Route::resource('addAdmin', AddAdminController::class);
    Route::post('addAdmin/store', [AddAdminController::class, 'store']);
    Route::get('menus', [AdminController::class, 'menus']);
    Route::post('/{id}/logout', [AuthController::class, 'logout']);
    Route::get('dashboard', [AdminController::class, 'index']);
    Route::resource('menus', MenuController::class);
    Route::post('menus/store', [MenuController::class, 'store']);
    Route::resource('restaurants', RestaurantController::class);
    Route::post('restaurants/store', [RestaurantController::class, 'store']);
    Route::resource('orders', OrderController::class);
    Route::resource('customers', CustomerController::class);
});
