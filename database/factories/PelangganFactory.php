<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Pelanggan;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Pelanggan::class, function (Faker $faker) {
    return [
        'nama_pelanggan' => $faker->name,
        'no_telp' => $faker->phoneNumber,
        'email' => $faker->unique()->freeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
