<?php


namespace App\Http\Response;


use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StandardHttpResponse
{
    public static function validateException(Validator $validator)
    {
        $exception = new ValidationException($validator);
        $errors = $exception->errors();

        return new HttpResponseException(
            response()->json(StandardHttpResponse::json(false, $errors, null), Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    public static function json(bool $success, string $message, $data): array
    {
        return ['success' => $success, 'message' => $message, 'data' => $data];
    }

    public static function authorizationException()
    {
        $exception = new AuthorizationException();
        $errors = $exception->getMessage();

        return new HttpResponseException(
            response()->json(StandardHttpResponse::json(false, $errors, null), Response::HTTP_UNAUTHORIZED)
        );
    }
}
