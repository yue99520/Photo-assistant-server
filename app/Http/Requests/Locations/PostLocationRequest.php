<?php

namespace App\Http\Requests\Locations;

use App\Http\ValidateRules\LocationValidateRule;
use Illuminate\Foundation\Http\FormRequest;

class PostLocationRequest extends FormRequest
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
            "title" => LocationValidateRule::title(),
            "subtitle" => LocationValidateRule::subTitle(),
            "longitude" => LocationValidateRule::longitude(),
            "latitude" => LocationValidateRule::latitude(),
            "image" => LocationValidateRule::image(),
        ];
    }
}
