<?php

namespace Database\Seeders;

use App\Models\InventarisBangunan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarisBangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InventarisBangunan::create([
            'kategori_bangunan_id' => 1,
            'kondisi_bangunan_id' => 1,
            'bertingkat' => 2,
            'luas_bangunan' => 500,
            'luas_tanah' => 600,
            'kode_tanah' => 'TN-0001',
            'tahun' => 2022,
            'no_bangunan' => 'B-001',
            'status_tanah_id' => 1,
            'pengguna_barang_id' => 1,
            'asal_id' => 1,
            'beton' => 1,
            'harga' => 50000000,
        ]);
        InventarisBangunan::create([
            'kategori_bangunan_id' => 2,
            'kondisi_bangunan_id' => 2,
            'bertingkat' => 1,
            'luas_bangunan' => 300,
            'luas_tanah' => 400,
            'kode_tanah' => 'TN-0002',
            'tahun' => 2022,
            'no_bangunan' => 'B-002',
            'status_tanah_id' => 2,
            'pengguna_barang_id' => 2,
            'asal_id' => 2,
            'beton' => 1,
            'harga' => 60000000,
        ]);
    }
}