<?php

namespace App\Http\Requests\Locations;

use App\Http\ValidateRules\LocationValidateRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
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
            "id" => LocationValidateRule::id(),
            "longitude" => LocationValidateRule::longitude(),
            "latitude" => LocationValidateRule::latitude(),
            "title" => LocationValidateRule::title(),
            "subtitle" => LocationValidateRule::subTitle(),
        ];
    }
}
