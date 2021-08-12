<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function sendResponse($error_code,$error_message,$data,$statusCode)
    {
        $response = [
            'error_code'=>$error_code,
            'error_message'=>$error_message,
            'data'=>$data,
        ];
        return response()->json($response,$statusCode);
    }
}
