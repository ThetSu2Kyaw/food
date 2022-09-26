<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AddAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.admin.addAdmin.index", [
            "admins" => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.admin.addAdmin.create");
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
            "name" => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
            "email" => ['required', 'email'],
            "password" => ['required', 'min:6']
        ]);

        $formData['is_admin'] = true;

        if(request('profile')){
            $formData['profile'] = request('profile')->store("admins");
        }else{
            $formData['profile'] = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
        }

        User::create($formData);

        return redirect('/admin/addAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("backend.admin.addAdmin.show", [
            "admin" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("backend.admin.addAdmin.edit", [
            "admin" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $formData = request()->validate([
            "name" => 'required',
            "email" => 'required',
            "password" => 'required'
        ]);

        $formData['profile'] = request('profile')? request('profile')->store('admins'): $user->profile;

        return redirect('/admin/addAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete($id);

        return redirect('/admin/addAdmin');
    }
}
