<?php

namespace Database\Seeders;

use App\Models\Dusun;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\RukunWarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keluarga::all()->each(function ($row) {
            $keluarga = $row->id;
            $faker = Faker::create('id_ID');
            $namaAyah = $faker->name('male');
            $nikAyah = $faker->unique()->nik();
            $status = 1;
            $statusDasar = 1;
            $statusKawin = 2;
            $statusBKawin = 1;
            $namaIbu = $faker->name('female');
            $nikIbu = $faker->unique()->nik();
            $agama = $faker->numberBetween(1, 6);
            $suku = $faker->numberBetween(1, 50);
            $l = 1;
            $p = 2;
            $kepala = 1;
            $istri = 3;
            $anak = 4;
            $hkk = 1;
            $hka = 2;
            $alamat = 'Goa Boma';
            $dusun = 1;
            $rw = 1;
            $rt = 1;
            $noAktaNikah = 'NI/'.$faker->randomDigit();
            $tglPernikahan = $faker->dateTimeBetween('-25 years', '-20 years');

            // kepala
            Penduduk::create([
                'nama' => $namaAyah,
                'nik' => $nikAyah,
                'keluarga_id' => $keluarga,
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->dateTimeBetween('-50 years', '-40 years'),
                'attr_kelamin_id' => $l,
                'attr_pendidikan_keluarga_id' => $faker->numberBetween(3, 10),
                'attr_status_id' => $status,
                'attr_status_dasar_id' => $statusDasar,
                'attr_agama_id' => $agama,
                'attr_pekerjaan_id' => $faker->numberBetween(1, 80),
                'attr_hubungan_id' => $kepala,
                'attr_hubungan_keluarga_id' => $hkk,
                'attr_status_kawin_id' => $statusKawin,
                'attr_suku_id' => $suku,
                'attr_golongan_darah_id' => $faker->numberBetween(1, 12),
                'attr_warganegara_id' => 1,
                'attr_bahasa_id' => $faker->numberBetween(1, 6),
                'alamat' => $alamat,
                'dusun_id' => $dusun,
                'rukun_warga_id' => $rw,
                'rukun_tetangga_id' => $rt,
                'nama_ayah' => $faker->name('male'),
                'nik_ayah' => $faker->unique()->nik(),
                'nama_ibu' => $faker->name('female'),
                'nik_ibu' => $faker->unique()->nik(),
                'tlp' => $faker->phoneNumber(),
                'tanggal_pernikahan' => $tglPernikahan,
                'no_akta_pernikahan' => $noAktaNikah,
                'tanggal_lapor' => $faker->dateTimeBetween('-50 years', '-40 years'),
            ]);
            // istri
            Penduduk::create([
                'nama' => $namaIbu,
                'nik' => $nikIbu,
                'keluarga_id' => $keluarga,
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->dateTimeBetween('-40 years', '-30 years'),
                'attr_kelamin_id' => $p,
                'attr_pendidikan_keluarga_id' => $faker->numberBetween(3, 10),
                'attr_status_id' => $status,
                'attr_status_dasar_id' => $statusDasar,
                'attr_agama_id' => $agama,
                'attr_pekerjaan_id' => $faker->numberBetween(1, 80),
                'attr_hubungan_id' => $istri,
                'attr_hubungan_keluarga_id' => $hka,
                'attr_status_kawin_id' => $statusKawin,
                'attr_suku_id' => $suku,
                'attr_golongan_darah_id' => $faker->numberBetween(1, 12),
                'attr_warganegara_id' => 1,
                'attr_bahasa_id' => $faker->numberBetween(1, 6),
                'alamat' => $alamat,
                'dusun_id' => $dusun,
                'rukun_warga_id' => $rw,
                'rukun_tetangga_id' => $rt,
                'nama_ayah' => $faker->name('male'),
                'nik_ayah' => $faker->unique()->nik(),
                'nama_ibu' => $faker->name('female'),
                'nik_ibu' => $faker->unique()->nik(),
                'tlp' => $faker->phoneNumber(),
                'tanggal_pernikahan' => $tglPernikahan,
                'no_akta_pernikahan' => $noAktaNikah,
                'tanggal_lapor' => $faker->dateTimeBetween('-40 years', '-30 years'),
            ]);
            // anak laki
            Penduduk::create([
                'nama' => $faker->name('male'),
                'nik' => $faker->unique()->nik(),
                'keluarga_id' => $keluarga,
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->dateTimeBetween('-20 years', '-20 years'),
                'attr_kelamin_id' => $l,
                'attr_pendidikan_keluarga_id' => $faker->numberBetween(3, 10),
                'attr_status_id' => $status,
                'attr_status_dasar_id' => $statusDasar,
                'attr_agama_id' => $agama,
                'attr_pekerjaan_id' => $faker->numberBetween(1, 80),
                'attr_hubungan_id' => $anak,
                'attr_hubungan_keluarga_id' => $hka,
                'attr_status_kawin_id' => $statusBKawin,
                'attr_suku_id' => $suku,
                'attr_golongan_darah_id' => $faker->numberBetween(1, 12),
                'attr_warganegara_id' => 1,
                'attr_bahasa_id' => $faker->numberBetween(1, 6),
                'alamat' => $alamat,
                'dusun_id' => $dusun,
                'rukun_warga_id' => $rw,
                'rukun_tetangga_id' => $rt,
                'nama_ayah' => $namaAyah,
                'nik_ayah' => $nikAyah,
                'nama_ibu' => $namaIbu,
                'nik_ibu' => $nikIbu,
                'tlp' => $faker->phoneNumber(),
            ]);
            // anak perem
            Penduduk::create([
                'nama' => $faker->name('female'),
                'nik' => $faker->unique()->nik(),
                'keluarga_id' => $keluarga,
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->dateTimeBetween('-20 years', '-20 years'),
                'attr_kelamin_id' => $p,
                'attr_pendidikan_keluarga_id' => $faker->numberBetween(3, 10),
                'attr_status_id' => $status,
                'attr_status_dasar_id' => $statusDasar,
                'attr_agama_id' => $agama,
                'attr_pekerjaan_id' => $faker->numberBetween(1, 80),
                'attr_hubungan_id' => $anak,
                'attr_hubungan_keluarga_id' => $hka,
                'attr_status_kawin_id' => $statusBKawin,
                'attr_suku_id' => $suku,
                'attr_golongan_darah_id' => $faker->numberBetween(1, 12),
                'attr_warganegara_id' => 1,
                'attr_bahasa_id' => $faker->numberBetween(1, 6),
                'alamat' => $alamat,
                'dusun_id' => $dusun,
                'rukun_warga_id' => $rw,
                'rukun_tetangga_id' => $rt,
                'nama_ayah' => $namaAyah,
                'nik_ayah' => $nikAyah,
                'nama_ibu' => $namaIbu,
                'nik_ibu' => $nikIbu,
                'tlp' => $faker->phoneNumber(),
            ]);
        });
    }
}