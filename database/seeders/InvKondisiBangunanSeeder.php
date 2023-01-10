<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvKondisiBangunan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvKondisiBangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Baik',
            'Rusak Ringan',
            'Rusak Sedang',
            'Rusak Berat',
        ];
        foreach ($data as $item) {
            InvKondisiBangunan::create([
                'nama' => $item
            ]);
        }
    }
}