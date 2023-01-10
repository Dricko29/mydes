<?php

namespace Database\Seeders;

use App\Models\InvPenggunaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvPenggunaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Industri',
            'Jalan',
            'Komersial',
            'Permukiman',
            'Tanah Publik',
            'Tanah Kosong',
            'Perkebunan',
            'Pertanian'
        ];

        foreach ($data as $item) {
            InvPenggunaan::create([
                'nama' => $item
            ]);
        }
    }
}