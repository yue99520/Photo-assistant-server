<?php

namespace App\Http\Controllers;

use App\Http\Formatters\UserFormatter;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Response\StandardHttpResponse;

class UserController extends Controller
{
    public function get(UserFormatter $formatter)
    {
        $user = auth()->user();

        return response()->json(StandardHttpResponse::json(true, 'ok', [
            'user' => $formatter->format($user)
        ]));
    }

    public function update(UserUpdateRequest $request, UserFormatter $formatter)
    {
        $validatedData = $request->validated();

        $user = auth()->user();

        $user->name = $validatedData['name'];

        $user->save();

        return response()->json(StandardHttpResponse::json(true, 'ok', [
            'user' => $formatter->format($user)
        ]));
    }
}
