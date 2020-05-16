<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserTokenInitRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
            'device_name.required' => 'Device name is required.'
        ];
    }
}
