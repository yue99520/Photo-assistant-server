<?php

namespace App\Http\Requests\Location;

use App\Http\Requests\BaseFormRequest;

class CreateLocationRequest extends BaseFormRequest
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
            "longitude" => ['required', 'numeric'],
            "latitude" => ['required', 'numeric'],
            "title" => ['required', 'string', 'max:50'],
            "subtitle" => ['required', 'string', 'max:255'],
        ];
    }
}
