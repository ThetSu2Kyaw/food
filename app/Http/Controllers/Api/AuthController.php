<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function login(Request $request){
        $formData = request()->validate([
            "email" => 'required',
            "password" => 'required'
        ]);

        $customer = Customer::where('email', $request->email)->sole();
        if($customer)
        {
            // Hash::check($request->password, $customer->password)
            if(Hash::check(request('password'), $customer->password )){
                $auth = Auth::login($customer);
                $token = $customer->createToken('Customer Token')->accessToken;
                $customer_resource = new CustomerResource($customer); 
                return $this->successResponse(['token' => $token, 'customer' => $customer_resource]);
            }else{
                return "something wrong";
            }
        }
        
    }
       
   public function register(){
        $formData = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $formData['password'] = Hash::make($formData['password']);

        $customer = Customer::create($formData);
        $auth = Auth::login($customer);
        $token = $customer->createToken('Customer Token')->accessToken;
        return $this->successResponse(['token' => $token, 'customer' => $customer]);
   }

   public function logout(){
    auth()->user()->token()->revoke();
    return 'success';
    // if (Auth::check()) {
    //     Auth::customer()->token()->revoke();
    //     return response()->json(['success' =>'logout_success'],200); 
    // }else{
    //     return response()->json(['error' =>'api.something_went_wrong'], 500);
    // }
   }
}
