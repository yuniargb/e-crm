<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Staf;
use Faker\Generator as Faker;

$factory->define(Staf::class, function (Faker $faker) {
    return [
        'nama_staf' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->userName,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});
