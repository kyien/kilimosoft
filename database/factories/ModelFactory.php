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
    static $password;

    return [
        'firstName' => $faker->name,
        'lastName' => $faker->name,
        'phoneNo' =>$faker->phonenumber,
        'username' =>$faker->usename,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstName' => $faker->name,
        'lastName' => $faker->name,
        'phoneNo' =>$faker->phonenumber,
        'username' =>$faker->usename,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Sale::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstName' => $faker->name,
        'lastName' => $faker->name,
        'phoneNo' =>$faker->phonenumber,
        'username' =>$faker->usename,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
