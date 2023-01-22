<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Surat::create([
            'klasifikasi_surat_id' => 1,
            'nama' => 'Surat Pengantar',
            'masa_berlaku' => '30 Hari',
            'jenis' => 'docx',
            'link' => '/site/cetakSurat/pengantar'
        ]);
        Surat::create([
            'klasifikasi_surat_id' => 2,
            'nama' => 'Surat Biodata',
            'masa_berlaku' => '30 Hari',
            'jenis' => 'docx',
            'link' => '/site/cetakSurat/biodata'
        ]);
    }
}