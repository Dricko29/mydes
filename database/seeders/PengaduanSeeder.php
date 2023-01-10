<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengaduan::create([
           'nik' => '1232123454345678',
           'nama' => 'Dandi',
           'Judul' => 'Jalan Rusak',
           'email' => 'dricko@gmail.com',
           'tlp' => '1254505498',
           'isi'  => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries"
        ]);
        Pengaduan::create([
           'nik' => '1232123454345678',
           'nama' => 'Joe',
           'Judul' => 'WC Umum Rusak',
           'email' => 'dricko@gmail.com',
           'tlp' => '1254505498',
           'isi'  => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries"
        ]);
        Pengaduan::create([
           'nik' => '1232123454345678',
           'nama' => 'Toni',
           'Judul' => 'Ternak Liar',
           'email' => 'dricko@gmail.com',
           'tlp' => '1254505498',
           'isi'  => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries"
        ]);
    }
}