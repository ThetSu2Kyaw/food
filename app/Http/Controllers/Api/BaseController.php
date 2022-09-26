<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function successResponse($data, $message = null){
        $response = [
            'code' => 1,
            'messsage' => $message??'Success',
            'data' => $data
        ];
        return response()->json($response);
    }

    public function failResponse($errors){
        $response = [
            'code' => 2,
            'message' => 'Error',
            'error' => $errors
        ];
        return response()->json($response);
    }
}
