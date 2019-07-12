<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
        $pelanggan = App\Pelanggan::pluck('id')->toArray();
        $i = 1;
        while ($i <= 300) {
            $id =  "STD01-" . date('d') . date('m') . $i;
            DB: table('invoices')->insert([
                'id' => $id,
                'tgl_inv' => $faker->date('Y-m-d', 'now'),
                'total_hrg' => $faker->randomNumber(6, false),
                'pelanggan_id' => $faker->randomElement($pelanggan),
            ]);
            $i++;
        }
    }
}
