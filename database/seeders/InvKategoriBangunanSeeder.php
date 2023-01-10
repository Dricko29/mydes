<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvKategoriBangunan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvKategoriBangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode' => 'GDB-00001', 'nama' => 'GEDUNG DAN BANGUNAN'],
            ['kode' => 'BG-00002', 'nama' => 'BANGUNAN GEDUNG'],
            ['kode' => 'BGTK-00003', 'nama' => 'BANGUNAN GEDUNG TEMPAT KERJA'],
            ['kode' => 'BGK-00004', 'nama' => 'BANGUNAN GEDUNG KANTOR'],
            ['kode' => 'BGKP-00005', 'nama' => 'BANGUNAN GEDUNG KANTOR PERMANEN'],
            ['kode' => 'BGKSP-00006', 'nama' => 'BANGUNAN GEDUNG KANTOR SEMI PERMANEN'],
            ['kode' => 'BGKD-00007', 'nama' => 'BANGUNAN GEDUNG KANTOR DARURAT'],
            ['kode' => 'RP-00008', 'nama' => 'RUMAH PANEL'],
            ['kode' => 'BGKL-00009', 'nama' => 'BANGUNAN GEDUNG KANTOR LAINNYA'],
            ['kode' => 'BG-00010', 'nama' => 'BANGUNAN GUDANG'],
            ['kode' => 'BGTP-00011', 'nama' => 'BANGUNAN GUDANG TERTUTUP PERMANEN'],
            ['kode' => 'BGTSP-00012', 'nama' => 'BANGUNAN GUDANG TERTUTUP SEMI PERMANEN'],
            ['kode' => 'BGTD-00013', 'nama' => 'BANGUNAN GUDANG TERTUTUP DARURAT'],
            ['kode' => 'BGTP-00014', 'nama' => 'BANGUNAN GUDANG TERBUKA PERMANEN'],
            ['kode' => 'BGTSP-00015', 'nama' => 'BANGUNAN GUDANG TERBUKA SEMI PERMANEN'],
            ['kode' => 'BGTD-00016', 'nama' => 'BANGUNAN GUDANG TERBUKA DARURAT'],
            ['kode' => 'BGL-00017', 'nama' => 'BANGUNAN GUDANG LAINNYA'],
            ['kode' => 'BGUB-00018', 'nama' => 'BANGUNAN GEDUNG UNTUK BENGKEL'],
            ['kode' => 'BBP-00019', 'nama' => 'BANGUNAN BENGKEL PERMANEN'],
            ['kode' => 'BBSP-00020', 'nama' => 'BANGUNAN BENGKEL SEMI PERMANEN'],
            ['kode' => 'BBD-00021', 'nama' => 'BANGUNAN BENGKEL DARURAT'],
            ['kode' => 'BGUBL-00022', 'nama' => 'BANGUNAN GEDUNG UNTUK BENGKEL LAINNYA'],
            ['kode' => 'BGI-00023', 'nama' => 'BANGUNAN GEDUNG INSTALASI'],
            ['kode' => 'GIS-00024', 'nama' => 'GEDUNG INSTALASI STUDIO'],
            ['kode' => 'GIP-00025', 'nama' => 'GEDUNG INSTALASI PEMANCAR'],
            ['kode' => 'BGIL-00026', 'nama' => 'BANGUNAN GEDUNG INSTALASI LAINNYA'],
            ['kode' => 'BGL-00027', 'nama' => 'BANGUNAN GEDUNG LABORATORIUM'],
            ['kode' => 'BGLP-00028', 'nama' => 'BANGUNAN GEDUNG LABORATORIUM PERMANEN'],
            ['kode' => 'BGLSP-00029', 'nama' => 'BANGUNAN GEDUNG LABORATORIUM SEMI PERMANEN'],
            ['kode' => 'BGLD-00030', 'nama' => 'BANGUNAN GEDUNG LABORATORIUM DARURAT'],
            ['kode' => 'BGLL-00031', 'nama' => 'BANGUNAN GEDUNG LABORATORIUM LAINNYA'],
            ['kode' => 'BK-00032', 'nama' => 'BANGUNAN KESEHATAN'],
            ['kode' => 'BP-00033', 'nama' => 'BANGUNAN POSYANDU'],
            ['kode' => 'BPPBD-00034', 'nama' => 'BANGUNAN POLINDES PONDOK BERSALIN DESA'],
            ['kode' => 'BA-00035', 'nama' => 'BANGUNAN APOTIK'],
            ['kode' => 'BTKOJ-00036', 'nama' => 'BANGUNAN TOKO KHUSUS OBAT JAMU'],
            ['kode' => 'BKL-00037', 'nama' => 'BANGUNAN KESEHATAN LAINNYA'],
            ['kode' => 'BGTI-00038', 'nama' => 'BANGUNAN GEDUNG TEMPAT IBADAH'],
            ['kode' => 'BGTIP-00039', 'nama' => 'BANGUNAN GEDUNG TEMPAT IBADAH PERMANEN'],
            ['kode' => 'BGTISP-00040', 'nama' => 'BANGUNAN GEDUNG TEMPAT IBADAH SEMI PERMANEN'],
            ['kode' => 'BGTID-00041', 'nama' => 'BANGUNAN GEDUNG TEMPAT IBADAH DARURAT'],

        ];
        foreach ($data as $item) {
            InvKategoriBangunan::create([
                'kode' => $item['kode'],
                'nama' => $item['nama']
            ]);
        }
    }
}