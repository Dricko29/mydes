<?php

namespace Database\Seeders;

use App\Models\InvStatusTanah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvStatusTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Tanah milik Pemda',
            'Tanah Negara (Tanah yang dikuasai langsung oleh Negara)',
            'Tanah Hak Ulayat (Tanah masyarakat Hukum Adat)',
            'Tanah Hak (Tanah kepunyaan perorangan atau Badan Hukum)',
        ];
        foreach ($data as $item) {
            InvStatusTanah::create([
                'nama' => $item
            ]);
        }
    }
}