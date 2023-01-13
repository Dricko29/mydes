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
        $this->call(TanggapanPengaduanSeeder::class);
        $this->call(SumberDanaSeeder::class);
        // inv
        $this->call(InvSeeder::class);
        $this->call(InventarisPeralatanSeeder::class);
        $this->call(InventarisTanahSeeder::class);
        $this->call(InventarisBangunanSeeder::class);
        // $this->call(InvPenggunaanSeeder::class);
        // $this->call(InvAsalSeeder::class);
        // $this->call(InvHakTanahSeeder::class);
        // $this->call(InvPenggunaBarangSeeder::class);
        // $this->call(InvKategoriPeralatanSeeder::class);
        // $this->call(InvKategoriTanahSeeder::class);
        // $this->call(InvKategoriBangunanSeeder::class);
        // $this->call(InvKondisiBangunanSeeder::class);
        // $this->call(InvKategoriAssetSeeder::class);
        // $this->call(InvJenisAssetSeeder::class);
        // $this->call(InvFisikBangunanSeeder::class);
        
    }
}