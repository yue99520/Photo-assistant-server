<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseFormRequest;


class LoginRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
            'device_name' => ['required', 'string'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
