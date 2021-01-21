<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'mobile'=>'sometimes|min:11|string|unique:users,mobile|',
            'password'=>'required|confirmed|min:4'
        ];
    }
}
