<?php

namespace Database\Seeders;

use App\Models\TanggapanPengaduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TanggapanPengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TanggapanPengaduan::create([
            'pengaduan_id' => 1,
            'respon'=> 'Sudah ditinjau bosku',
            'created_by' => 1 
        ]);
    }
}