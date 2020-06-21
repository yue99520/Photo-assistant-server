<?php

namespace App\Http\Requests\Entries;

use App\Entry;
use App\Http\Response\StandardHttpResponse;
use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEntryRequest extends FormRequest
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

            return $entry->location->user->id === auth()->id();

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
            'entry_id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string']
        ];
    }

    protected function failedAuthorization()
    {
        throw StandardHttpResponse::authorizationException();
    }

    protected function failedValidation(Validator $validator)
    {
        throw StandardHttpResponse::validateException($validator);
    }
}
