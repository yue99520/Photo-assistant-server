<?php

namespace App\Http\Requests\Auth;

use App\Http\ValidateRules\TokenValidateRule;
use App\Http\ValidateRules\UserValidateRule;
use Illuminate\Foundation\Http\FormRequest;


class LoginRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => UserValidateRule::loginEmail(),
            'password' => UserValidateRule::checkPassword(),
            'device_name' => TokenValidateRule::deviceName(),
        ];
    }
}
