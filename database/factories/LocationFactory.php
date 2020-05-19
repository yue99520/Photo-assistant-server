<?php

/** @var Factory $factory */


use App\Location;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Location::class, function (Faker $faker) {

    $dateTime = $faker->dateTime;
    return [
        "user_id" => factory(User::class)->create()->id,
        "title" => $faker->title,
        "subtitle" => $faker->sentence,
        "longitude" => $faker->longitude,
        "latitude" => $faker->latitude,
        "updated_at" => $dateTime,
        "created_at" => $dateTime,
    ];
});

$factory->state(Location::class, 'without_user', function (Faker $faker) {

    $dateTime = $faker->dateTime;
    return [
        "user_id" => null,
        "title" => $faker->title,
        "subtitle" => $faker->sentence,
        "longitude" => $faker->longitude,
        "latitude" => $faker->latitude,
        "updated_at" => $dateTime,
        "created_at" => $dateTime,
    ];
});
