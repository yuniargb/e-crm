<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Fasilitas;
use Faker\Generator as Faker;

$factory->define(Fasilitas::class, function (Faker $faker) {
    $fas = ['penanjakan 1 & 2', 'melihat sunrise','melihat sunset','museum', 'kampung bajo', 'pantai gigi hiu,','pulau pasir','pantai tanjung lesung','pulau saronde'];
    $paket = App\Paket::pluck('id')->toArray();
    return [
        'nama_fasilitas' => $faker->randomElement($fas),
        'paket_id' => $faker->randomElement($paket),
    ];
});
