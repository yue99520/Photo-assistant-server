<?php

namespace Tests\Feature;

use Tests\PreAccessTokenTestCase;
use Tests\Variables;

class AuthTest extends PreAccessTokenTestCase
{

    public function test_can_get_bearer_token()
    {
        $response = $this->post('/api/token',
            [
                "email" => Variables::$EMAIL,
                "password" => Variables::$PASSWORD,
                "device_name" => Variables::$DEVICE_NAME,
            ]
        );

        $response->assertOk();

        $bearer = "Bearer " . explode("|", $response->getContent())[1];

        self::assertNotNull($bearer);

        $this->bearer = $bearer;
    }
}
