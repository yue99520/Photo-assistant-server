<?php

namespace Tests\Feature;

use Tests\PreAccessTokenTestCase;

class UserTest extends PreAccessTokenTestCase
{

    public function test_get_user()
    {
        $response = $this
            ->withHeader("Authorization", $this->bearer)
            ->get('/api/user');

        $response
            ->assertOk()
            ->assertJsonStructure(
                [
                    "id",
                    "name",
                    "email",
                    "email_verified_at",
                    "created_at",
                    "updated_at",
                ]
            );
    }
}
