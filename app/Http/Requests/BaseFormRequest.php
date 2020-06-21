<?php


namespace App\Http\Requests;


use App\Http\Response\StandardHttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{
    public abstract function authorize();

    public abstract function rules();

    protected function failedAuthorization()
    {
        throw StandardHttpResponse::authorizationException();
    }

    protected function failedValidation(Validator $validator)
    {
        throw StandardHttpResponse::validateException($validator);
    }
}
