<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvPenggunaBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvPenggunaBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Pemerintah Desa',
            'BPD',
            'Karang Taruna',
            'LKMD',
            'PKK',
            'RW',
            'RT',
            'Dusun'
        ];
        foreach ($data as $item) {
            InvPenggunaBarang::create([
                'nama' => $item
            ]);
        }
    }
}