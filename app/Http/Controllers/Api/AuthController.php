<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
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

    public function logout(Request $request)
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['success' => true]);
    }

    public function isLogin(Request $request)
    {
        return response()->json(['success' => true, 'message' => 'success']);
    }
}
