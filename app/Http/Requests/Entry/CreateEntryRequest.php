<?php

namespace App\Http\Requests\Entry;

use App\Http\Response\StandardHttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $data = $this->request->all();

        return auth()->user()->locations()->find($data['location_id'])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'location_id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string']
        ];
    }

    protected function failedAuthorization()
    {
        return StandardHttpResponse::authorizationException();
    }

    protected function failedValidation(Validator $validator)
    {
        return StandardHttpResponse::validateException($validator);
    }
}
