<?php

namespace Database\Seeders;

use App\Models\InvHakTanah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvHakTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Hak Pakai',
            'Hak Kelola'
        ];
        foreach ($data as $item) {
            InvHakTanah::create([
                'nama' => $item
            ]);
        }
    }
}