<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\IsLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Response\StandardHttpResponse;
use App\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use function auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::query()->where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {

            $token = $user->createToken($validatedData['device_name'])->plainTextToken;

            $token = explode("|", $token)[1];

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

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::query()->create($validatedData);

        return response()->json(StandardHttpResponse::json(true, "ok", [
            'user' => $user->toArray()
        ]));
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(StandardHttpResponse::json(true, "ok", [
            //
        ]));
    }

    public function isLogin(IsLoginRequest $request)
    {
        $validatedData = $request->validated();
        if (PersonalAccessToken::findToken($validatedData['token']) != null) {

            return response()->json(StandardHttpResponse::json(true, "ok", [
                //
            ]));
        } else {
            return response()->json(StandardHttpResponse::json(false, "fail", [
                //
            ]));
        }
    }
}
