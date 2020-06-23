<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testApiRegister()
    {
        $name = "yue99520";
        $email = "test@gmail.com";
        $password = "test123456";

        $response = $this->json("POST", '/api/member/register', [
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "password_confirmation" => $password,
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                "success" => true,
                "message" => "ok",
                "data" => [
                    "user" => [
                        "id" => 1,
                        "name" => $name,
                        "email" => $email,
                    ]
                ]
            ]);
    }

    public function testApiLogin()
    {
        $name = "TestUser";
        $email = "test@gmail.com";
        $password = "test123456";
        $deviceName = "MY_DEVICE_NAME";

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $response = $this->json("POST", "api/member/login", [
            'email' => $email,
            'password' => $password,
            'device_name' => $deviceName,
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "message",
                "data" => [
                    "token"
                ]
            ])
            ->assertJson([
                "success" => true,
                "message" => "ok",
                "data" => [
                    //
                ]
            ]);
    }

    public function testApiIsLogin()
    {
        $name = "TestUser";
        $email = "test@gmail.com";
        $password = "test123456";
        $deviceName = "MY_DEVICE_NAME";

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $response = $this->json("POST", "api/member/login", [
            'email' => $email,
            'password' => $password,
            'device_name' => $deviceName,
        ]);

        $token = $response->json()['data']['token'];

        $response = $this->json("POST", "api/member/login_check", [
            "token" => $token,
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                "success" => true,
                "message" => "ok",
                "data" => [
                    //
                ],
            ]);
    }

    public function testApiLogout()
    {
        $name = "TestUser";
        $email = "test@gmail.com";
        $password = "test123456";
        $deviceName = "MY_DEVICE_NAME";

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $response = $this->json("POST", "api/member/login", [
            'email' => $email,
            'password' => $password,
            'device_name' => $deviceName,
        ]);

        $token = $response->json()['data']['token'];

        $response = $this->withHeaders([
            "Authorization" => "Bearer " . $token
        ])->json("POST", "api/member/logout", []);

        $response
            ->assertStatus(200)
            ->assertJson([
                "success" => true,
                "message" => "ok",
                "data" => [],
            ]);

        $response = $this->json("POST", "api/member/login_check", [
            "token" => $token,
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                "success" => false,
                "message" => "fail",
                "data" => [],
            ]);
    }
}
