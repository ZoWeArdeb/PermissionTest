<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IClass;
use Faker\Generator as Faker;

$factory->define(IClass::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
