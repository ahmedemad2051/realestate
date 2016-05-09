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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Bu::class, function (Faker\Generator $faker) {
    return [
        'bu_name' => $faker->company,
        'bu_rooms' => $faker->numberBetween(1,10),
        'bu_price' => $faker->numberBetween(2000,5000000),
        'bu_rent' => $faker->numberBetween(0,1),
        'bu_square' => $faker->numberBetween(200,2000),
        'bu_place' => $faker->numberBetween(0,3),
        'bu_type' => $faker->numberBetween(0,2),
        'bu_small_dis' => $faker->text(160),
        'bu_large_dis' => $faker->paragraph(),
        'bu_meta' => $faker->text,
        'bu_longitude' => $faker->longitude,
        'bu_latitude' => $faker->latitude,
        'bu_status' => $faker->numberBetween(0,1),
        'user_id' => $faker->numberBetween(4,100),
        
    ];
});
