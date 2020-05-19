<?php

namespace Tests\Unit;

use App\Location;
use App\User;
use Tests\TestCase;

class LocationTest extends TestCase
{
    public function testLocationCanGetUser()
    {
        $location = factory(Location::class)->create();
        $user = $location->user;

        $this->assertNotNull($user);
        $this->assertTrue($user instanceof User);
        $this->assertTrue($user->id === $location->user_id);
    }

    public function testUserCanGetLocations()
    {
        $user = factory(User::class)->create();

        $locations = factory(Location::class, 10)
            ->state("without_user")
            ->create();

        foreach ($locations as $location) {
            $location->user_id = $user->id;
            $location->save();
        }

        $this->assertCount(10, $user->locations);
    }
}
