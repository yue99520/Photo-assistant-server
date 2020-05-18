<?php

namespace App\Http\Controllers;

use App\Http\Formatters\UserFormatter;
use App\Http\Requests\User\UserUpdateRequest;

class UserController extends Controller
{
    public function get(UserFormatter $formatter)
    {
        return $formatter->formatOne(auth()->user());
    }

    public function update(UserUpdateRequest $request, UserFormatter $formatter)
    {
        $validatedData = $request->validated();

        $user = auth()->user();

        $user->name = $validatedData['name'];

        $user->save();

        return $formatter->formatOne($user);
    }
}
