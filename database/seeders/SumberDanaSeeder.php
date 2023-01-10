<?php

namespace Database\Seeders;

use App\Models\SumberDana;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SumberDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Pendapatan Asli Daerah',
            'Alokasi Anggaran Pendapatan dan Belanja Negara (Dana Desa)',
            'Alokasi Dana Desa',
            'Hibah dan Sumbangan',
            'Lainnya Pendapatan Desa'
        ];
        foreach ($data as $item) {
            SumberDana::create([
                'nama' => $item
            ]);
        }
    }
}