<?php

/** @var Factory $factory */

use App\EventCondition;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(EventCondition::class, function (Faker $faker) {
    return [
        'event' => $faker->monthName,
    ];
});
