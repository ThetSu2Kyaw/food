<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\Township;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.restaurant.index', [
            "restaurants" => Restaurant::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.restaurant.create', [
            "rest_categories" => RestaurantCategory::all(),
            "townships" => Township::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = request()->validate([
            "name" => ['required'],
            "address" => ['required'],
            "phone" => ['required'],
            "is_open" => ['required'],
            "is_promotion" => ['required'],
            "township_id" => ['required'],
            "restaurant_category_id" => ['required']
        ]);

        $formData['image'] = request('image')->store('restaurants');

        Restaurant::create($formData);

        return redirect('/admin/restaurants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('backend.admin.restaurant.show', [
            "rest" => $restaurant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('backend.admin.restaurant.edit', [
            "rest" => $restaurant,
            "rest_categories" => RestaurantCategory::all(),
            "townships" => Township::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $formData = request()->validate([
            "name" => ['required'],
            "address" => ['required'],
            "phone" => ['required'],
            "is_open" => ['required'],
            "is_promotion" => ['required'],
            "township_id" => ['required'],
            "restaurant_category_id" => ['required']
        ]);

        $formData['image'] = request('image')? request('image')->store('restaurants'): $restaurant->image;

        $restaurant->update($formData);

        return redirect('/admin/restaurants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect('/admin/restaurants');
    }
}
