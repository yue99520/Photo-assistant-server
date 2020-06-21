<?php

namespace App\Http\Requests\Entry;

use App\Http\Response\StandardHttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GetAllEntriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $data = $this->request->all();

        return auth()->user()->locations()->find($data['location'])->exists();
    }

    public function failedAuthorization()
    {
        throw StandardHttpResponse::authorizationException();
    }

    public function failedValidation(Validator $validator)
    {
        throw StandardHttpResponse::validateException($validator);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "location_id" => ['required', 'numeric']
        ];
    }
}
