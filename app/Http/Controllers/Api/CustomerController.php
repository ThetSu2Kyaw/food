<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends BaseController
{
    public function show($id){
        $customer = new CustomerResource(Customer::find($id));
        
        return $this->successResponse($customer);
    }

    public function update($id){
        $formData = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);
        
        $customer = Customer::find($id);

        $customer->update($formData);

        return $this->successResponse($customer);
    }
}
