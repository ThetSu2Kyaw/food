<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('frontend.signup');
    }

    public function login_index(){
        return view('frontend.login');
    }
}
