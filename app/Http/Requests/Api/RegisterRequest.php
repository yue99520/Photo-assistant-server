<?php

namespace App\Http\Requests\Api;

use App\Http\ValidateRules\UserValidateRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            "name" => UserValidateRule::name(),
            "email" => UserValidateRule::email(),
            "password" => UserValidateRule::updatePassword(),
        ];
    }
}
