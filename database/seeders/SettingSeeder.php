<?php

namespace Database\Seeders;

use Settings;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::group('umum')->set([
            'app_nama' => 'MYDES',
            'app_email' => 'mydes@gmail.com',
            'app_tlp' => '+6281250429788',
            'app_website' => 'www.mydes.com',
        ]);
    }
}