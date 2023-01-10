<?php

namespace Database\Seeders;

use App\Models\InvAsal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvAsalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Bantuan Kabupaten',
            'Bantuan Pemerintah',
            'Bantuan Provinsi',
            'Pembelian Desa',
            'Sumbangan',
            'Hak Adat',
            'Hibah'
        ];
        foreach ($data as $item) {
            InvAsal::create([
                'nama' => $item
            ]);
        }
    }
}