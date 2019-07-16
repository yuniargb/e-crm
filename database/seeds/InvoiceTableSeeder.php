<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
        $no = '2';
        $id = [];
        for($i = 0; $i<300; $i++){
            if(strlen($no)==1){
                $format = 'INV' . '07' . '19' . '00' . $no;
                $id[$i] = $format;
            }elseif(strlen($no)==2){
                $format = 'INV' . '07' . '19' . '0' . $no;
                $id[$i] = $format;
            }else{
                $format = 'INV' . '07' . '19' . $no;
                $id[$i] = $format;
            }
            DB::table('invoices')->insert([
                'id' => $id[$i],
                'tgl_inv' => $faker->date('Y-m-d', 'now'),
                'total_hrg' => $faker->randomNumber(6, false),
                'pelanggan_id' => $faker->randomElement($pelanggan),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $no++;
        }
    }
}
