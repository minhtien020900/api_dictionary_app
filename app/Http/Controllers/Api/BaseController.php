<?php


namespace App\Http\Controllers\Api;


class BaseController
{
    public function sendResponse($error_code,$error_message,$data)
    {
        $response = [
            'error_code'=>$error_code,
            'error_message'=>$error_message,
            'data'=>$data,
        ];
        return response()->json($response);
    }
}
