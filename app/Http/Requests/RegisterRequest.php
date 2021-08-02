<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public $validator = null;

    public function __construct()
    {

    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|unique:users,email',
            'password' => 'bail|required|min:5|confirmed',
            'password_confirmation' => [
                'bail',
                'required',

            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required',
//            'password_confirmation.same:password' => ['Password confirm not match']
        ];
    }

    public function attributes()
    {
        return [
            'name' => trans('attribute_field.user_name'),
            'email' => trans('attribute_field.email'),
            'password' => trans('attribute_field.password'),
            'password_confirmation' => trans('attribute_field.password_confirmation')
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
