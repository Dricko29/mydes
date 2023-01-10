<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::all()->each(function($row){
            Pegawai::factory()->create([
                'jabatan_id' => $row->id
            ]);
        });
    }
}