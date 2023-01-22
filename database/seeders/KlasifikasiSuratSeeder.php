<?php

namespace Database\Seeders;

use App\Models\KlasifikasiSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlasifikasiSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KlasifikasiSurat::create([
            'nama' => 'Surat Pengantar Penduduk',
            'kode' => 'SP.01',
            'ket' => 'Surat Pengantar Penduduk'
        ]);
        KlasifikasiSurat::create([
            'nama' => 'Surat Biodata Penduduk',
            'kode' => 'SB.01',
            'ket' => 'Surat Biodata Penduduk'
        ]);
    }
}