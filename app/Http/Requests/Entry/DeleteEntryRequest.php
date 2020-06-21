<?php

namespace App\Http\Requests\Entry;

use App\Entry;
use App\Http\Requests\BaseFormRequest;
use Exception;

class DeleteEntryRequest extends BaseFormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        try {
            $data = $this->request->all();

            $entry = Entry::query()->find($data['entry_id']);

            return $entry->location->user_id === auth()->id();

        } catch (Exception $exception) {

            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'entry_id' => ['required', 'numeric']
        ];
    }
}
