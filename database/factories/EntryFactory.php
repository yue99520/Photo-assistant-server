<?php

/** @var Factory $factory */


use App\Entry;
use App\EventCondition;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Entry::class, function (Faker $faker) {

    return [
        'title' => $faker->title,
        'subtitle' => $faker->text,
        'entriable_id' => factory(EventCondition::class)->create()->id,
        'entriable_type' => EventCondition::class
    ];
});
