<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<20; $i++){
            DB::table('lapangans')->insert([
            'user_id' => 7+$i,
            'namalapangan' => 'sanbaulung'.$i,
            'kota' => 'Semarang'.$i,
            'jml_lapangan'=> '5',
            'harga'=> 7000+$i,
            'phone'=> '08976541'.$i,
            'aktif'=>'siang',
            'detail'=>
            'Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Ipsa ut sed at quam quidem dolor ratione eveniet repellat,
            Ipsa ut sed at quam quidem dolor ratione eveniet repellat,
            totam maiores, fugiat iste consequatur in?',
            'gambar1' => 'img/lapangan/yxBZFe9Bw1u63ykKD0D4xeHsUBX8TOyRvcTZ2MOu.jpg',
            'gambar2' => 'img/lapangan/yxBZFe9Bw1u63ykKD0D4xeHsUBX8TOyRvcTZ2MOu.jpg',
            'status' => 1
            ]);
       }
    }
}
