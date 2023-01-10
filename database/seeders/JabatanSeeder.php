<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            'KEPALA DESA',
            'SEKRETARIS DESA',
            'KAUR UMUM',
            'KASI PEMERINTAHAN'
        ];
        foreach ($datas as $data) {
            Jabatan::create([
                'nama' => $data
            ]);
        }
    }
}