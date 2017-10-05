<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'country_code' => '+45',
        'phone' => $faker->randomDigit(8),
        'verified_at' => \Carbon\Carbon::today(),
        'remember_token' => str_random(10),
    ];
});
