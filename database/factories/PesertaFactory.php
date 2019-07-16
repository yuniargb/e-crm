<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Peserta;
use Faker\Generator as Faker;

$factory->define(Peserta::class, function (Faker $faker) {
    $paket = App\Paket::pluck('id')->toArray();
    $inv = App\Invoice::pluck('id')->toArray();
    return [
        'paket_id' => $faker->randomElement($paket),
        'invoice_id' => $faker->randomElement($inv),
        'no_dukumen' => $faker->randomNumber(6, false),
        'nama_peserta' => $faker->name,
        'tgl_berangkat' => $faker->date('Y-m-d', 'now'),
    ];
});
