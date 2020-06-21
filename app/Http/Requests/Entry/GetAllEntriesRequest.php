<?php

namespace App\Http\Requests\Entry;

use App\Http\Requests\BaseFormRequest;

class GetAllEntriesRequest extends BaseFormRequest
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
