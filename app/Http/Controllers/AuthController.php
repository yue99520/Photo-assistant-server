<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Response\StandardHttpResponse;
use App\User;
use Illuminate\Support\Facades\Hash;
use function auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::query()->where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {

            $token = $user->createToken($validatedData['device_name'])->plainTextToken;

            return response()->json(StandardHttpResponse::json(true, "ok", [
                "token" => $token,
            ]));
        }

        return response()->json(StandardHttpResponse::json(false, "Wrong email or password.", [
            "token" => null,
        ]));
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $password = Hash::make($validatedData['password']);

        $user = User::query()->create([
            "password" => $password
        ]);

        return response()->json(StandardHttpResponse::json(true, "ok", $user->toArray()));
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(StandardHttpResponse::json(true, "ok", []));
    }

    public function isLogin()
    {
        $user = auth()->user();
        return response()->json(StandardHttpResponse::json(true, "ok", $user->toArray()));
    }
}
