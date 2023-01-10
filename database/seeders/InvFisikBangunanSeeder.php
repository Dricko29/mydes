<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvFisikBangunan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvFisikBangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Darurat',
            'Permanen',
            'Semi Permanen',
        ];
        foreach ($data as $item) {
            InvFisikBangunan::create([
                'nama' => $item
            ]);
        }
    }
}