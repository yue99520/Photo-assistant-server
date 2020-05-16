<?php

namespace Tests;

use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase, CreatesApplication;

    protected $bearer = "";

    protected function setUp(): void
    {
        parent::setUp();

        DB::table('users')->insert([
            'name' => Variables::$NAME,
            'email' => Variables::$EMAIL,
            'password' => Hash::make(Variables::$PASSWORD),
        ]);

        $this->bearer = $this->getBearerToken();
    }

    private function getBearerToken()
    {
        try {
            $response = $this->post('/api/token',
                [
                    "email" => Variables::$EMAIL,
                    "password" => Variables::$PASSWORD,
                    "device_name" => Variables::$DEVICE_NAME,
                ]
            );

            return "Bearer " . explode("|", $response->getContent())[1];
        } catch (Exception $exception) {

            fail("Cannot get bearer token.");
            return null;
        }
    }
}
