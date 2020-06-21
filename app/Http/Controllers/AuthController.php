<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use function auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::query()->where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {

            $token = $user->createToken($request->input('device_name'))->plainTextToken;

            return response()->json(['success' => true, 'token' => $token, 'message' => 'success']);
        }

        return response()->json(['success' => false, 'token' => null, 'message' => 'wrong email or password.']);
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::query()->create($validatedData);

        return response()->json(['success' => true]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['success' => true]);
    }

    public function isLogin()
    {
        return response()->json(['success' => true, 'message' => 'success']);
    }
}
