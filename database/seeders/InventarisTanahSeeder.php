<?php

namespace Database\Seeders;

use App\Models\InventarisTanah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventarisTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InventarisTanah::create([
            'kategori_tanah_id' => 1,
            'luas' => 500,
            'tahun' => 2022,
            'hak_tanah_id' => 1,
            'no_sertifikat' => 'TN-002/GB',
            'penggunaan_id' => 1,
            'pengguna_barang_id' => 1,
            'asal_id' => 1,
            'harga' => 500000000,
            'alamat' => 'Dusun Singkong',
            'keterangan' => '-',
        ]);
    }
}