<?php

namespace Database\Seeders;

use App\Models\InventarisPeralatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarisPeralatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InventarisPeralatan::create([
            'kategori_peralatan_id' => 1,
            'merk' => 'Cannon',
            'ukuran' => '5 Inc',
            'bahan' => 'Karbon',
            'no_pabrik' => 'P-001',
            'no_rangka' => 'R-001',
            'no_mesin' => 'M-001',
            'tahun' => 2022,
            'pengguna_barang_id' => 1,
            'asal_id' => 1,
            'harga' => 3000000,
            'keterangan' => '-',
        ]);
    }
}