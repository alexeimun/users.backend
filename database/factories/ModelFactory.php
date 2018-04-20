<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'code' => $faker->randomNumber(4),
        'type' => $faker->randomElement([1, 2, 3]),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {

    return [
        'comment' => $faker->text(100),
    ];
});