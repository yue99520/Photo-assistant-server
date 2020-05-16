<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTokenInitRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TokenController extends Controller
{
    public function init(UserTokenInitRequest $request)
    {
        $user = User::query()->where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {

            throw ValidationException::withMessages([
                'msg' => ['The provided credentials are incorrect.']
            ]);
        }

        return $user->createToken($request->input('device_name'))->plainTextToken;
    }
}
