<?php

namespace Database\Seeders;

use App\Models\InvJenisAsset;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvJenisAssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Buku',
            'Barang Kesenian',
            'Hewan Ternak',
            'Tumbuhan'
        ];
        foreach ($data as $item) {
            InvJenisAsset::create([
                'nama' => $item
            ]);
        }
    }
}