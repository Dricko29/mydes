<?php

namespace Database\Seeders;

use App\Models\AttrAgama;
use App\Models\AttrBahasa;
use App\Models\AttrGolonganDarah;
use App\Models\AttrHubungan;
use App\Models\AttrHubunganKeluarga;
use App\Models\AttrKelamin;
use App\Models\AttrPekerjaan;
use App\Models\AttrPendidikan;
use App\Models\AttrPendidikanKeluarga;
use App\Models\AttrStatus;
use App\Models\AttrStatusDasar;
use App\Models\AttrStatusKawin;
use App\Models\AttrSuku;
use App\Models\AttrWarganegara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttrPendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // agama
        $agamas = [
            'ISLAM',
            'KRISTEN',
            'KATHOLIK',
            'HINDU',
            'BUDHA',
            'KHONGHUCU',
            'Kepercayaan Terhadap Tuhan YME / Lainnya',
        ];
        foreach ($agamas as $data) {
            AttrAgama::create([
                'nama' => $data
            ]);
        }

        // bahasa
        $bahasa = [
            ['nama' => 'L', 'deskripsi' => 'Latin'],
            ['nama' => 'D', 'deskripsi' => 'Daerah'],
            ['nama' => 'A', 'deskripsi' => 'Arab'],
            ['nama' => 'AL', 'deskripsi' => 'Arab dan Latin'],
            ['nama' => 'AD', 'deskripsi' => 'Arab dan Daerah'],
            ['nama' => 'ALD', 'deskripsi' => 'Arab, Latin dan Daerah'],

        ];
        foreach ($bahasa as $data) {
            AttrBahasa::create([
                'nama' => $data['nama'],
                'deskripsi' => $data['deskripsi'],

            ]);
        }

        // status
        $status = [
            'TETAP',
            'TIDAK TETAP',
        ];
        foreach ($status as $data) {
            AttrStatus::create([
                'nama' => $data
            ]);
        }

        // status_dasar
        $statusDasar = [
            'HIDUP',
            'MATI',
            'PINDAH',
            'HILANG',
            'PERGI',
            'TIDAK VALID',
        ];
        foreach ($statusDasar as $data) {
            AttrStatusDasar::create([
                'nama' => $data
            ]);
        }

        // kelamin
        AttrKelamin::create([
            'nama' => 'LAKI-LAKI',
            'slug' => 'L'
        ]);
        AttrKelamin::create([
            'nama' => 'PEREMPUAN',
            'slug' => 'P'
        ]);

        // pendidikan
        $pendidikan = [
            'BELUM MASUK TK/KELOMPOK BERMAIN',
            'SEDANG TK/KELOMPOK BERMAIN',
            'TIDAK PERNAH SEKOLAH',
            'SEDANG SD/SEDERAJAT',
            'TIDAK TAMAT SD/SEDERAJAT',
            'SEDANG SLTP/SEDERAJAT',
            'SEDANG SLTA/SEDERAJAT',
            'SEDANG  D-1/SEDERAJAT',
            'SEDANG D-2/SEDERAJAT',
            'SEDANG D-3/SEDERAJAT',
            'SEDANG  S-1/SEDERAJAT',
            'SEDANG S-2/SEDERAJAT',
            'SEDANG S-3/SEDERAJAT',
            'SEDANG SLB A/SEDERAJAT',
            'SEDANG SLB B/SEDERAJAT',
            'SEDANG SLB C/SEDERAJAT',
        ];
        foreach ($pendidikan as $data) {
            AttrPendidikan::create([
                'nama' => $data
            ]);
        }

        // pendidikan_kk
        $pendidikanKK = [
            'TIDAK / BELUM SEKOLAH',
            'BELUM TAMAT SD/SEDERAJAT',
            'TAMAT SD / SEDERAJAT',
            'SLTP/SEDERAJAT',
            'SLTA / SEDERAJAT',
            'DIPLOMA I / II',
            'AKADEMI/ DIPLOMA III/S. MUDA',
            'DIPLOMA IV/ STRATA I',
            'STRATA II',
            'STRATA III',
        ];
        foreach ($pendidikanKK as $data) {
            AttrPendidikanKeluarga::create([
                'nama' => $data
            ]);
        }

        // pekerjaan
        $pekerjaan = [
            'BELUM/TIDAK BEKERJA',
            'MENGURUS RUMAH TANGGA',
            'PELAJAR/MAHASISWA',
            'PENSIUNAN',
            'PEGAWAI NEGERI SIPIL (PNS)',
            'TENTARA NASIONAL INDONESIA (TNI)',
            'KEPOLISIAN RI (POLRI)',
            'PERDAGANGAN',
            'PETANI/PEKEBUN',
            'PETERNAK',
            'NELAYAN/PERIKANAN',
            'INDUSTRI',
            'KONSTRUKSI',
            'TRANSPORTASI',
            'KARYAWAN SWASTA',
            'KARYAWAN BUMN',
            'KARYAWAN BUMD',
            'KARYAWAN HONORER',
            'BURUH HARIAN LEPAS',
            'BURUH TANI/PERKEBUNAN',
            'BURUH NELAYAN/PERIKANAN',
            'BURUH PETERNAKAN',
            'PEMBANTU RUMAH TANGGA',
            'TUKANG CUKUR',
            'TUKANG LISTRIK',
            'TUKANG BATU',
            'TUKANG KAYU',
            'TUKANG SOL SEPATU',
            'TUKANG LAS/PANDAI BESI',
            'TUKANG JAHIT',
            'TUKANG GIGI',
            'PENATA RIAS',
            'PENATA BUSANA',
            'PENATA RAMBUT',
            'MEKANIK',
            'SENIMAN',
            'TABIB',
            'PARAJI',
            'PERANCANG BUSANA',
            'PENTERJEMAH',
            'IMAM MASJID',
            'PENDETA',
            'PASTOR',
            'WARTAWAN',
            'USTADZ/MUBALIGH',
            'JURU MASAK',
            'PROMOTOR ACARA',
            'ANGGOTA DPR-RI',
            'ANGGOTA DPD',
            'ANGGOTA BPK',
            'PRESIDEN',
            'WAKIL PRESIDEN',
            'ANGGOTA MAHKAMAH KONSTITUSI',
            'ANGGOTA KABINET KEMENTERIAN',
            'DUTA BESAR',
            'GUBERNUR',
            'WAKIL GUBERNUR',
            'BUPATI',
            'WAKIL BUPATI',
            'WALIKOTA',
            'WAKIL WALIKOTA',
            'ANGGOTA DPRD PROVINSI',
            'ANGGOTA DPRD KABUPATEN/KOTA',
            'DOSEN',
            'GURU',
            'PILOT',
            'PENGACARA',
            'NOTARIS',
            'ARSITEK',
            'AKUNTAN',
            'KONSULTAN',
            'DOKTER',
            'BIDAN',
            'PERAWAT',
            'APOTEKER',
            'PSIKIATER/PSIKOLOG',
            'PENYIAR TELEVISI',
            'PENYIAR RADIO',
            'PELAUT',
            'PENELITI',
            'SOPIR',
            'PIALANG',
            'PARANORMAL',
            'PEDAGANG',
            'PERANGKAT DESA',
            'KEPALA DESA',
            'BIARAWATI',
            'WIRASWASTA',
            'LAINNYA',
        ];
        foreach ($pekerjaan as $data) {
            AttrPekerjaan::create([
                'nama' => $data
            ]);
        }

        // status_kawin
        $kaswin = [
            'BELUM KAWIN',
            'KAWIN',
            'CERAI HIDUP',
            'CERAI MATI',
        ];
        foreach ($kaswin as $data) {
            AttrStatusKawin::create([
                'nama' => $data
            ]);
        }

        // hubungan
        $hubungan = [
            'KEPALA KELUARGA',
            'SUAMI',
            'ISTRI',
            'ANAK',
            'MENANTU',
            'CUCU',
            'ORANGTUA',
            'MERTUA',
            'FAMILI LAIN',
            'PEMBANTU',
            'LAINNYA',

        ];
        foreach ($hubungan as $data) {
            AttrHubungan::create([
                'nama' => $data
            ]);
        }

        // hubungan_kk
        $hubunganKK = [
            'KEPALA RUMAH TANGGA',
            'ANGGOTA',
        ];
        foreach ($hubunganKK as $data) {
            AttrHubunganKeluarga::create([
                'nama' => $data
            ]);
        }

        // suku
        $suku = [
            ['nama' => 'Aceh', 'deskripsi' => 'Aceh'],
            ['nama' => 'Alas', 'deskripsi' => 'Aceh'],
            ['nama' => 'Alor', 'deskripsi' => 'NTT'],
            ['nama' => 'Ambon', 'deskripsi' => 'Ambon'],
            ['nama' => 'Ampana', 'deskripsi' => 'Sulawesi Tengah'],
            ['nama' => 'Anak Dalam', 'deskripsi' => 'Jambi'],
            ['nama' => 'Aneuk Jamee', 'deskripsi' => 'Aceh'],
            ['nama' => 'Arab: Orang Hadhrami', 'deskripsi' => 'Arab: Orang Hadhrami'],
            ['nama' => 'Aru', 'deskripsi' => 'Maluku'],
            ['nama' => 'Asmat', 'deskripsi' => 'Papua'],
            ['nama' => 'Bare’e', 'deskripsi' => 'Bare’e di Kabupaten Tojo Una-Una Tojo dan Tojo Barat'],
            ['nama' => 'Banten', 'deskripsi' => 'Banten di Banten'],
            ['nama' => 'Besemah', 'deskripsi' => 'Besemah di Sumatera Selatan'],
            ['nama' => 'Bali', 'deskripsi' => 'Bali di Bali terdiri dari: Suku Bali Majapahit di sebagian besar Pulau Bali; Suku Bali Aga di Karangasem dan Kintamani'],
            ['nama' => 'Balantak', 'deskripsi' => 'Balantak di Sulawesi Tengah'],
            ['nama' => 'Banggai', 'deskripsi' => 'Banggai di Sulawesi Tengah (Kabupaten Banggai Kepulauan)'],
            ['nama' => 'Baduy', 'deskripsi' => 'Baduy di Banten'],
            ['nama' => 'Bajau', 'deskripsi' => 'Bajau di Kalimantan Timur'],
            ['nama' => 'Banjar', 'deskripsi' => 'Banjar di Kalimantan Selatan'],
            ['nama' => 'Batak', 'deskripsi' => 'Sumatera Utara'],
            ['nama' => 'Batak Karo', 'deskripsi' => 'Sumatera Utara'],
            ['nama' => 'Mandailing', 'deskripsi' => 'Sumatera Utara'],
            ['nama' => 'Angkola', 'deskripsi' => 'Sumatera Utara'],
            ['nama' => 'Toba', 'deskripsi' => 'Sumatera Utara'],
            ['nama' => 'Pakpak', 'deskripsi' => 'Sumatera Utara'],
            ['nama' => 'Simalungun', 'deskripsi' => 'Sumatera Utara'],
            ['nama' => 'Batin', 'deskripsi' => 'Batin di Jambi'],
            ['nama' => 'Bawean', 'deskripsi' => 'Bawean di Jawa Timur (Gresik)'],
            ['nama' => 'Bentong', 'deskripsi' => 'Bentong di Sulawesi Selatan'],
            ['nama' => 'Berau', 'deskripsi' => 'Berau di Kalimantan Timur (kabupaten Berau)'],
            ['nama' => 'Betawi', 'deskripsi' => 'Betawi di Jakarta'],
            ['nama' => 'Bima', 'deskripsi' => 'Bima NTB (kota Bima)'],
            ['nama' => 'Boti', 'deskripsi' => 'Boti di kabupaten Timor Tengah Selatan'],
            ['nama' => 'Bolang Mongondow', 'deskripsi' => 'Bolang Mongondow di Sulawesi Utara (Kabupaten Bolaang Mongondow)'],
            ['nama' => 'Bugis', 'deskripsi' => 'Bugis di Sulawesi Selatan: Orang Bugis Pagatan di Kalimantan Selatan, Kusan Hilir, Tanah Bumbu'],
            ['nama' => 'Bungku', 'deskripsi' => 'Bungku di Sulawesi Tengah (Kabupaten Morowali)'],
            ['nama' => 'Buru', 'deskripsi' => 'Buru di Maluku (Kabupaten Buru)'],
            ['nama' => 'Buol', 'deskripsi' => 'Buol di Sulawesi Tengah (Kabupaten Buol)'],
            ['nama' => 'Bulungan ', 'deskripsi' => 'Bulungan di Kalimantan Timur (Kabupaten Bulungan)'],
            ['nama' => 'Buton', 'deskripsi' => 'Buton di Sulawesi Tenggara (Kabupaten Buton dan Kota Bau-Bau)'],
            ['nama' => 'Bonai', 'deskripsi' => 'Bonai di Riau (Kabupaten Rokan Hilir)'],
            ['nama' => 'Cham ', 'deskripsi' => 'Cham di Aceh'],
            ['nama' => 'Cirebon ', 'deskripsi' => 'Cirebon di Jawa Barat (Kota Cirebon)'],
            ['nama' => 'Damal', 'deskripsi' => 'Damal di Mimika'],
            ['nama' => 'Dampeles', 'deskripsi' => 'Dampeles di Sulawesi Tengah'],
            ['nama' => 'Dani ', 'deskripsi' => 'Dani di Papua (Lembah Baliem)'],
            ['nama' => 'Dairi', 'deskripsi' => 'Dairi di Sumatera Utara'],
            ['nama' => 'Daya ', 'deskripsi' => 'Daya di Sumatera Selatan'],
            ['nama' => 'Dayak', 'deskripsi' => 'Dayak terdiri dari: Suku Dayak Ahe di Kalimantan Barat; Suku Dayak Bajare di Kalimantan Barat; Suku Dayak Damea di Kalimantan Barat; Suku Dayak Banyadu di Kalimantan Barat; Suku Bakati di Kalimantan Barat; Suku Punan di Kalimantan Tengah; Suku Kanayatn di Kalimantan Barat; Suku Dayak Krio di Kalimantan Barat (Ketapang); Suku Dayak Sungai Laur di Kalimantan Barat (Ketapang); Suku Dayak Simpangh di Kalimantan Barat (Ketapang); Suku Iban di Kalimantan Barat; Suku Mualang di Kalimantan Barat (Sekada'],
            ['nama' => 'Dompu', 'deskripsi' => 'Dompu NTB (Kabupaten Dompu)'],
            ['nama' => 'Donggo', 'deskripsi' => 'Donggo, Bima'],
            ['nama' => 'Dongga', 'deskripsi' => 'Donggala di Sulawesi Tengah'],
            ['nama' => 'Dondo ', 'deskripsi' => 'Dondo di Sulawesi Tengah (Kabupaten Toli-Toli)'],
            ['nama' => 'Duri', 'deskripsi' => 'Duri Terletak di bagian utara Kabupaten Enrekang berbatasan dengan Kabupaten Tana Toraja, meliputi tiga kecamatan induk Anggeraja, Baraka, dan Alla di Sulawesi Selatan'],
            ['nama' => 'Eropa ', 'deskripsi' => 'Eropa (orang Indo, peranakan Eropa-Indonesia, atau etnik Mestizo)'],
            ['nama' => 'Flores', 'deskripsi' => 'Flores di NTT (Flores Timur)'],
            ['nama' => 'Lamaholot', 'deskripsi' => 'Lamaholot, Flores Timur, terdiri dari: Suku Wandan, di Solor Timur, Flores Timur; Suku Kaliha, di Solor Timur, Flores Timur; Suku Serang Gorang, di Solor Timur, Flores Timur; Suku Lamarobak, di Solor Timur, Flores Timur; Suku Atanuhan, di Solor Timur, Flores Timur; Suku Wotan, di Solor Timur, Flores Timur; Suku Kapitan Belen, di Solor Timur, Flores Timur'],
            ['nama' => 'Gayo', 'deskripsi' => 'Gayo di Aceh (Gayo Lues Aceh Tengah Bener Meriah Aceh Tenggara Aceh Timur Aceh Tamiang)'],
            ['nama' => 'Gorontalo', 'deskripsi' => 'Gorontalo di Gorontalo (Kota Gorontalo)'],
            ['nama' => 'Gumai ', 'deskripsi' => 'Gumai di Sumatera Selatan (Lahat)'],
            ['nama' => 'India', 'deskripsi' => 'India, terdiri dari: Suku Tamil di Aceh, Sumatera Utara, Sumatera Barat, dan DKI Jakarta; Suku Punjab di Sumatera Utara, DKI Jakarta, dan Jawa Timur; Suku Bengali di DKI Jakarta; Suku Gujarati di DKI Jakarta dan Jawa Tengah; Orang Sindhi di DKI Jakarta dan Jawa Timur; Orang Sikh di Sumatera Utara, DKI Jakarta, dan Jawa Timur'],
            ['nama' => 'Jawa', 'deskripsi' => 'Jawa di Jawa Tengah, Jawa Timur, DI Yogyakarta'],
            ['nama' => 'Tengger', 'deskripsi' => 'Tengger di Jawa Timur (Probolinggo, Pasuruan, dan Malang)'],
            ['nama' => 'Osing ', 'deskripsi' => 'Osing di Jawa Timur (Banyuwangi)'],
            ['nama' => 'Samin ', 'deskripsi' => 'Samin di Jawa Tengah (Purwodadi)'],
            ['nama' => 'Bawean', 'deskripsi' => 'Bawean di Jawa Timur (Pulau Bawean)'],
            ['nama' => 'Jambi ', 'deskripsi' => 'Jambi di Jambi (Kota Jambi)'],
            ['nama' => 'Jepang', 'deskripsi' => 'Jepang di DKI Jakarta, Jawa Timur, dan Bali'],
            ['nama' => 'Kei', 'deskripsi' => 'Kei di Maluku Tenggara (Kabupaten Maluku Tenggara dan Kota Tual)'],
            ['nama' => 'Kaili ', 'deskripsi' => 'Kaili di Sulawesi Tengah (Kota Palu)'],
            ['nama' => 'Kampar', 'deskripsi' => 'Kampar'],
            ['nama' => 'Kaur ', 'deskripsi' => 'Kaur di Bengkulu (Kabupaten Kaur)'],
            ['nama' => 'Kayu Agung', 'deskripsi' => 'Kayu Agung di Sumatera Selatan'],
            ['nama' => 'Kerinci', 'deskripsi' => 'Kerinci di Jambi (Kabupaten Kerinci)'],
            ['nama' => 'Komering ', 'deskripsi' => 'Komering di Sumatera Selatan (Kabupaten Ogan Komering Ilir, Baturaja)'],
            ['nama' => 'Konjo Pegunungan', 'deskripsi' => 'Konjo Pegunungan, Kabupaten Gowa, Sulawesi Selatan'],
            ['nama' => 'Konjo Pesisir', 'deskripsi' => 'Konjo Pesisir, Kabupaten Bulukumba, Sulawesi Selatan'],
            ['nama' => 'Koto', 'deskripsi' => 'Koto di Sumatera Barat'],
            ['nama' => 'Kubu', 'deskripsi' => 'Kubu di Jambi dan Sumatera Selatan'],
            ['nama' => 'Kulawi', 'deskripsi' => 'Kulawi di Sulawesi Tengah'],
            ['nama' => 'Kutai ', 'deskripsi' => 'Kutai di Kalimantan Timur (Kutai Kartanegara)'],
            ['nama' => 'Kluet ', 'deskripsi' => 'Kluet di Aceh (Aceh Selatan)'],
            ['nama' => 'Korea ', 'deskripsi' => 'Korea di DKI Jakarta'],
            ['nama' => 'Krui', 'deskripsi' => 'Krui di Lampung'],
            ['nama' => 'Laut,', 'deskripsi' => 'Laut, Kepulauan Riau'],
            ['nama' => 'Lampung', 'deskripsi' => 'Lampung, terdiri dari: Suku Sungkai di Lampung; Suku Abung di Lampung; Suku Way Kanan di Lampung, Sumatera Selatan dan Bengkulu; Suku Pubian di Lampung; Suku Tulang Bawang di Lampung; Suku Melinting di Lampung; Suku Peminggir Teluk di Lampung; Suku Ranau di Lampung, Sumatera Selatan dan Sumatera Utara; Suku Komering di Sumatera Selatan; Suku Cikoneng di Banten; Suku Merpas di Bengkulu; Suku Belalau di Lampung; Suku Smoung di Lampung; Suku Semaka di Lampung'],
            ['nama' => 'Lematang ', 'deskripsi' => 'Lematang di Sumatera Selatan'],
            ['nama' => 'Lembak', 'deskripsi' => 'Lembak, Kabupaten Rejang Lebong, Bengkulu'],
            ['nama' => 'Lintang', 'deskripsi' => 'Lintang, Sumatera Selatan'],
            ['nama' => 'Lom', 'deskripsi' => 'Lom, Bangka Belitung'],
            ['nama' => 'Lore', 'deskripsi' => 'Lore, Sulawesi Tengah'],
            ['nama' => 'Lubu', 'deskripsi' => 'Lubu, daerah perbatasan antara Provinsi Sumatera Utara dan Provinsi Sumatera Barat'],
            ['nama' => 'Moronene', 'deskripsi' => 'Moronene di Sulawesi Tenggara.'],
            ['nama' => 'Madura', 'deskripsi' => 'Madura di Jawa Timur (Pulau Madura, Kangean, wilayah Tapal Kuda)'],
            ['nama' => 'Makassar', 'deskripsi' => 'Makassar di Sulawesi Selatan: Kabupaten Gowa, Kabupaten Takalar, Kabupaten Jeneponto, Kabupaten Bantaeng, Kabupaten Bulukumba (sebagian), Kabupaten Sinjai (bagian perbatasan Kab Gowa), Kabupaten Maros (sebagian), Kabupaten Pangkep (sebagian), Kota Makassar'],
            ['nama' => 'Mamasa', 'deskripsi' => 'Mamasa (Toraja Barat) di Sulawesi Barat: Kabupaten Mamasa'],
            ['nama' => 'Manda', 'deskripsi' => 'Mandar Sulawesi Barat: Polewali Mandar'],
            ['nama' => 'Melayu', 'deskripsi' => 'Melayu, terdiri dari Suku Melayu Tamiang di Aceh (Aceh Tamiang); Suku Melayu Riau di Riau dan Kepulauan Riau; Suku Melayu Deli di Sumatera Utara; Suku Melayu Jambi di Jambi; Suku Melayu Bangka di Pulau Bangka; Suku Melayu Belitung di Pulau Belitung; Suku Melayu Sambas di Kalimantan Barat'],
            ['nama' => 'Mentawai', 'deskripsi' => 'Mentawai di Sumatera Barat (Kabupaten Kepulauan Mentawai)'],
            ['nama' => 'Minahasa', 'deskripsi' => 'Minahasa di Sulawesi Utara (Kabupaten Minahasa), terdiri 9 subetnik : Suku Babontehu; Suku Bantik; Suku Pasan Ratahan'],
            ['nama' => 'Ponosakan', 'deskripsi' => 'Ponosakan; Suku Tonsea; Suku Tontemboan; Suku Toulour; Suku Tonsawang; Suku Tombulu'],
            ['nama' => 'Minangkabau', 'deskripsi' => 'Minangkabau, Sumatera Barat'],
            ['nama' => 'Mongondow', 'deskripsi' => 'Mongondow, Sulawesi Utara'],
            ['nama' => 'Mori', 'deskripsi' => 'Mori, Kabupaten Morowali, Sulawesi Tengah'],
            ['nama' => 'Muko-Muko', 'deskripsi' => 'Muko-Muko di Bengkulu (Kabupaten Mukomuko)'],
            ['nama' => 'Muna', 'deskripsi' => 'Muna di Sulawesi Tenggara (Kabupaten Muna)'],
            ['nama' => 'Muyu', 'deskripsi' => 'Muyu di Kabupaten Boven Digoel, Papua'],
            ['nama' => 'Mekongga', 'deskripsi' => 'Mekongga di Sulawesi Tenggara (Kabupaten Kolaka dan Kabupaten Kolaka Utara)'],
            ['nama' => 'Moro', 'deskripsi' => 'Moro di Kalimantan Barat dan Kalimantan Utara'],
            ['nama' => 'Nias', 'deskripsi' => 'Nias di Sumatera Utara (Kabupaten Nias, Nias Selatan dan Nias Utara dari dua keturunan Jepang dan Vietnam)'],
            ['nama' => 'Ngada ', 'deskripsi' => 'Ngada di NTT: Kabupaten Ngada'],
            ['nama' => 'Osing', 'deskripsi' => 'Osing di Banyuwangi Jawa Timur'],
            ['nama' => 'Ogan', 'deskripsi' => 'Ogan di Sumatera Selatan'],
            ['nama' => 'Ocu', 'deskripsi' => 'Ocu di Kabupaten Kampar, Riau'],
            ['nama' => 'Padoe', 'deskripsi' => 'Padoe di Sulawesi Tengah dan Sulawesi Selatan'],
            ['nama' => 'Papua', 'deskripsi' => 'Papua / Irian, terdiri dari: Suku Asmat di Kabupaten Asmat; Suku Biak di Kabupaten Biak Numfor; Suku Dani, Lembah Baliem, Papua; Suku Ekagi, daerah Paniai, Abepura, Papua; Suku Amungme di Mimika; Suku Bauzi, Mamberamo hilir, Papua utara; Suku Arfak di Manokwari; Suku Kamoro di Mimika'],
            ['nama' => 'Palembang', 'deskripsi' => 'Palembang di Sumatera Selatan (Kota Palembang)'],
            ['nama' => 'Pamona', 'deskripsi' => 'Pamona di Sulawesi Tengah (Kabupaten Poso) dan di Sulawesi Selatan'],
            ['nama' => 'Pesisi', 'deskripsi' => 'Pesisi di Sumatera Utara (Tapanuli Tengah)'],
            ['nama' => 'Pasir', 'deskripsi' => 'Pasir di Kalimantan Timur (Kabupaten Pasir)'],
            ['nama' => 'Pubian', 'deskripsi' => 'Pubian di Lampung'],
            ['nama' => 'Pattae', 'deskripsi' => 'Pattae di Polewali Mandar'],
            ['nama' => 'Pakistani', 'deskripsi' => 'Pakistani di Sumatera Utara, DKI Jakarta, dan Jawa Tengah'],
            ['nama' => 'Peranakan', 'deskripsi' => 'Peranakan (Tionghoa-Peranakan atau Baba Nyonya)'],
            ['nama' => 'Rawa', 'deskripsi' => 'Rawa, Rokan Hilir, Riau'],
            ['nama' => 'Rejang', 'deskripsi' => 'Rejang di Bengkulu (Kabupaten Bengkulu Tengah, Kabupaten Bengkulu Utara, Kabupaten Kepahiang, Kabupaten Lebong, dan Kabupaten Rejang Lebong)'],
            ['nama' => 'Rote', 'deskripsi' => 'Rote di NTT (Kabupaten Rote Ndao)'],
            ['nama' => 'Rongga', 'deskripsi' => 'Rongga di NTT Kabupaten Manggarai Timur'],
            ['nama' => 'Rohingya', 'deskripsi' => 'Rohingya'],
            ['nama' => 'Sabu', 'deskripsi' => 'Sabu di Pulau Sabu, NTT'],
            ['nama' => 'Saluan', 'deskripsi' => 'Saluan di Sulawesi Tengah'],
            ['nama' => 'Sambas', 'deskripsi' => 'Sambas (Melayu Sambas) di Kalimantan Barat: Kabupaten Sambas'],
            ['nama' => 'Samin', 'deskripsi' => 'Samin di Jawa Tengah (Blora) dan Jawa Timur (Bojonegoro)'],
            ['nama' => 'Sangi', 'deskripsi' => 'Sangir di Sulawesi Utara (Kepulauan Sangihe)'],
            ['nama' => 'Sasak', 'deskripsi' => 'Sasak di NTB, Lombok'],
            ['nama' => 'Sekak Bangka', 'deskripsi' => 'Sekak Bangka'],
            ['nama' => 'Sekayu', 'deskripsi' => 'Sekayu di Sumatera Selatan'],
            ['nama' => 'Semendo ', 'deskripsi' => 'Semendo di Bengkulu, Sumatera Selatan (Muara Enim)'],
            ['nama' => 'Serawai ', 'deskripsi' => 'Serawai di Bengkulu (Kabupaten Bengkulu Selatan dan Kabupaten Seluma)'],
            ['nama' => 'Simeulue', 'deskripsi' => 'Simeulue di Aceh (Kabupaten Simeulue)'],
            ['nama' => 'Sigulai ', 'deskripsi' => 'Sigulai di Aceh (Kabupaten Simeulue bagian utara'],
            ['nama' => 'Suluk', 'deskripsi' => 'Suluk di Kalimantan Utara)'],
            ['nama' => 'Sumbawa ', 'deskripsi' => 'Sumbawa Di NTB (Kabupaten Sumbawa)'],
            ['nama' => 'Sumba', 'deskripsi' => 'Sumba di NTT (Sumba Barat, Sumba Timur)'],
            ['nama' => 'Sunda', 'deskripsi' => 'Sunda di Jawa Barat, Banten, DKI Jakarta, Lampung, Sumatra Selatan dan Jawa Tengah'],
            ['nama' => 'Sungkai ', 'deskripsi' => 'Sungkai di Lampung Lampung Utara'],
            ['nama' => 'Talau', 'deskripsi' => 'Talaud di Sulawesi Utara (Kepulauan Talaud)'],
            ['nama' => 'Talang Mamak', 'deskripsi' => 'Talang Mamak di Riau (Indragiri Hulu)'],
            ['nama' => 'Tamiang ', 'deskripsi' => 'Tamiang di Aceh (Kabupaten Aceh Tamiang)'],
            ['nama' => 'Tengger ', 'deskripsi' => 'Tengger di Jawa Timur (Kabupaten Pasuruan) dan Probolinggo (lereng G. Bromo)'],
            ['nama' => 'Ternate ', 'deskripsi' => 'Ternate di Maluku Utara (Kota Ternate)'],
            ['nama' => 'Tidore', 'deskripsi' => 'Tidore di Maluku Utara (Kota Tidore)'],
            ['nama' => 'Tidung', 'deskripsi' => 'Tidung di Kalimantan Timur (Kabupaten Tanah Tidung)'],
            ['nama' => 'Timor', 'deskripsi' => 'Timor di NTT, Kota Kupang'],
            ['nama' => 'Tionghoa', 'deskripsi' => 'Tionghoa, terdiri dari: Orang Cina Parit di Pelaihari, Tanah Laut, Kalsel; Orang Cina Benteng di Tangerang, Provinsi Banten; Orang Tionghoa Hokkien di Jawa dan Sumatera Utara; Orang Tionghoa Hakka di Belitung dan Kalimantan Barat; Orang Tionghoa Hubei; Orang Tionghoa Hainan; Orang Tionghoa Kanton; Orang Tionghoa Hokchia; Orang Tionghoa Tiochiu'],
            ['nama' => 'Tojo', 'deskripsi' => 'Tojo di Sulawesi Tengah (Kabupaten Tojo Una-Una)'],
            ['nama' => 'Toraja', 'deskripsi' => 'Toraja di Sulawesi Selatan (Tana Toraja)'],
            ['nama' => 'Tolaki', 'deskripsi' => 'Tolaki di Sulawesi Tenggara (Kendari)'],
            ['nama' => 'Toli Toli', 'deskripsi' => 'Toli Toli di Sulawesi Tengah (Kabupaten Toli-Toli)'],
            ['nama' => 'Tomini', 'deskripsi' => 'Tomini di Sulawesi Tengah (Kabupaten Parigi Mouton'],
            ['nama' => 'Una-una ', 'deskripsi' => 'Una-una di Sulawesi Tengah (Kabupaten Tojo Una-Una)'],
            ['nama' => 'Ulu', 'deskripsi' => 'Ulu di Sumatera Utara (Mandailing natal)'],
            ['nama' => 'Wolio', 'deskripsi' => 'Wolio di Sulawesi Tenggara (Buton)'],

        ];
        foreach ($suku as $data) {
            AttrSuku::create([
                'nama' => $data['nama'],
                'deskripsi' => $data['deskripsi'],

            ]);
        }

        // darah
        $darah = [
            'A',
            'B',
            'AB',
            'O',
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
            'TIDAK TAHU',
        ];
        foreach ($darah as $data) {
            AttrGolonganDarah::create([
                'nama' => $data
            ]);
        }

        // warga
        $warga = [
            'WNI',
            'WNA',
            'DUA KEWARGANEGARAAN',
        ];
        foreach ($warga as $data) {
            AttrWarganegara::create([
                'nama' => $data
            ]);
        }
    }
}