<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.menu.index', [
            "menus" => Menu::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.menu.create', [
            "categories" => MenuCategory::all(),
            "restaurants" => Restaurant::all()
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
            "name" => ['required', 'min:3', 'max:255'], 
            "description" => ['required'],
            "menu_category_id" => ['required'],
            "price" => ['required'],
            "restaurant_id" => ['required']
        ]);

        $formData['image'] = request('image')->store("menus");

        Menu::create($formData);

        return redirect('/admin/menus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('backend.admin.menu.show', [
            'menu' => $menu
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('backend.admin.menu.edit', [
            "menu" => $menu,
            "categories" => MenuCategory::all(),
            "restaurants" => Restaurant::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $formData = request()->validate([
            "name" => ['required', 'min:3', 'max:255'], 
            "description" => ['required'],
            "menu_category_id" => ['required'],
            "price" => ['required'],
            "restaurant_id" => ['required']
        ]);

        $formData['image'] = request('image')? request('image')->store("menus"): $menu->image;

        $menu->update($formData);

        return redirect('/admin/menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('/admin/menus');
    }
}
