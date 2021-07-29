<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    //
    public function register(RegisterRequest $request)
    {

        if (isset($request->validator) && $request->validator->fails()) {
            $errors = $request->validator->messages();
            return $this->sendResponse(config('api_custom.have_error'), $errors, null,config('api_custom.422'));
        }


        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );

        $data = ['token' => $user->createToken('API Token')->plainTextToken];
        return $this->sendResponse(config('api_custom.no_have_error'), 0, $data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required|string|email',
            'password' => 'bail|required|string|min:6'
        ]);
        if ($validator->fails()) {
            return $this->sendResponse(config('api_custom.have_error'), $validator->errors(), null,config('api_custom.status_code.422'));
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            $error_msg = trans('custom_message.auth.failed');
            return $this->sendResponse(config('api_custom.have_error'), $error_msg, null,config('api_custom.status_code.401'));
        } else {
            $data = [
                'token' => \auth()->user()->createToken('API Token')->plainTextToken
            ];
            return $this->sendResponse(config('api_custom.no_have_error'), null, $data,config('api_custom.status_code.200'));
        }
    }

    public function logout()
    {
        \auth()->user()->tokens()->delete();
        $data = [
            'message' => 'Tokens Revoked',
        ];
        return $this->sendResponse(config('api_custom.no_have_error'), null, $data,config('api_custom.status_code.201'));
    }
}
