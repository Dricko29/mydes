<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolePermissionSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(AttrPendudukSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(DusunSeeder::class);
        $this->call(RukunWargaSeeder::class);
        $this->call(RukunTetanggaSeeder::class);
        $this->call(KeluargaSeeder::class);
        $this->call(PendudukSeeder::class);
        $this->call(PengaduanSeeder::class);
        $this->call(SumberDanaSeeder::class);
        
    }
}