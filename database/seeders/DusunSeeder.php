<?php

namespace Database\Seeders;

use App\Models\Dusun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dusun::create([
            'nama_dusun' => 'Dusun Goa Boma',
            'kode_dusun' => 'D-001',
            'nama_kadus' => 'Edu',
            'nik_kadus' => '2323234545654567',
            'attr_kelamins_id' => 1
        ]);
        Dusun::create([
            'nama_dusun' => 'Dusun Singkong',
            'kode_dusun' => 'D-002',
            'nama_kadus' => 'Ronal',
            'nik_kadus' => '2323234545654456',
            'attr_kelamins_id' => 1
        ]);
        Dusun::create([
            'nama_dusun' => 'Dusun Rungkanang',
            'kode_dusun' => 'D-003',
            'nama_kadus' => 'Wawat',
            'nik_kadus' => '2323236545654456',
            'attr_kelamins_id' => 1
        ]);
    }
}