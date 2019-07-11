<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Paket;
use Faker\Generator as Faker;

$factory->define(Paket::class, function (Faker $faker) {
    $kategori = App\Kategori::pluck('id')->toArray();
    return [
        'nama_paket' => $faker->state,
        'harga' => $faker->randomNumber(6, false),
        'gambar' => "gambar.png",
        'kategori_id' => $faker->randomElement($kategori),
    ];
});
