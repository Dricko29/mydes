<?php

namespace Database\Seeders;

use App\Models\RukunTetangga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RukunTetanggaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RukunTetangga::create([
            'rukun_wargas_id' => 1,
            'nama_rt' => 'RT-001',
            'kode_rt' => 'R1-R1',
            'nama_krt' => 'Dirly',
            'nik_krt' => '1212343234567600',
            'attr_kelamins_id' => 1
        ]);
        RukunTetangga::create([
            'rukun_wargas_id' => 2,
            'nama_rt' => 'RT-002',
            'kode_rt' => 'R2-R2',
            'nama_krt' => 'Joe',
            'nik_krt' => '121234323456810',
            'attr_kelamins_id' => 1
        ]);
        RukunTetangga::create([
            'rukun_wargas_id' => 3,
            'nama_rt' => 'RT-003',
            'kode_rt' => 'R3-R3',
            'nama_krt' => 'Day',
            'nik_krt' => '1212343234560023',
            'attr_kelamins_id' => 1
        ]);
    }
}