<?php

namespace Database\Seeders;

use App\Models\RukunWarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RukunWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RukunWarga::create([
            'dusuns_id' => 1,
            'nama_rw' => 'RW-001',
            'kode_rw' => 'D1-R1',
            'nama_krw' => 'Dirly',
            'nik_krw' => '1212343234567656',
            'attr_kelamins_id' => 1
        ]);
        RukunWarga::create([
            'dusuns_id' => 2,
            'nama_rw' => 'RW-002',
            'kode_rw' => 'D2-R2',
            'nama_krw' => 'Vero',
            'nik_krw' => '1212343234567687',
            'attr_kelamins_id' => 1
        ]);
        RukunWarga::create([
            'dusuns_id' => 3,
            'nama_rw' => 'RW-003',
            'kode_rw' => 'D3-R3',
            'nama_krw' => 'Duel',
            'nik_krw' => '1212343234567690',
            'attr_kelamins_id' => 1
        ]);
    }
}