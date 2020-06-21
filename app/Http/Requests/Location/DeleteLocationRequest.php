<?php

namespace App\Http\Requests\Location;

use App\Http\Requests\BaseFormRequest;

class DeleteLocationRequest extends BaseFormRequest
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
            'location_id' => ['required', 'numeric']
        ];
    }
}
