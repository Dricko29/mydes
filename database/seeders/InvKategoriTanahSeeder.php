<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvKategoriTanah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InvKategoriTanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode' => 'T-00001', 'nama' => 'TANAH'],
            ['kode' => 'TD-00002', 'nama' => 'TANAH DESA'],
            ['kode' => 'TKD-00003', 'nama' => 'TANAH KAS DESA'],
            ['kode' => 'TB-00004', 'nama' => 'TANAH BENGKOK'],
            ['kode' => 'TBKD-00005', 'nama' => 'TANAH BENGKOK KEPALA DESA'],
            ['kode' => 'TBL-00006', 'nama' => 'TANAH BENGKOK LAINNYA'],
            ['kode' => 'TB-00007', 'nama' => 'TANAH BONDO'],
            ['kode' => 'TKN-00008', 'nama' => 'TANAH KALAKERAN NEGERI'],
            ['kode' => 'TP-00009', 'nama' => 'TANAH PECATU'],
            ['kode' => 'TP-00010', 'nama' => 'TANAH PENGAREM-AREM'],
            ['kode' => 'TT-00011', 'nama' => 'TANAH TITISARA'],
            ['kode' => 'TP-00012', 'nama' => 'TANAH PERKAMPUNGAN'],
            ['kode' => 'TPL-00013', 'nama' => 'TANAH PERKAMPUNGAN LAINNYA'],
            ['kode' => 'E-00014', 'nama' => 'EMPLASMEN'],
            ['kode' => 'EL-00015', 'nama' => 'EMPLASMEN LAINNYA'],
            ['kode' => 'TK-00016', 'nama' => 'TANAH KUBURAN'],
            ['kode' => 'TKI-00017', 'nama' => 'TANAH KUBURAN ISLAM'],
            ['kode' => 'TKK-00018', 'nama' => 'TANAH KUBURAN KRISTEN'],
            ['kode' => 'TKC-00019', 'nama' => 'TANAH KUBURAN CINA'],
            ['kode' => 'TKH-00020', 'nama' => 'TANAH KUBURAN HINDU'],
            ['kode' => 'TKB-00021', 'nama' => 'TANAH KUBURAN BUDHA'],
            ['kode' => 'TMP-00022', 'nama' => 'TANAH MAKAM PAHLAWAN'],
            ['kode' => 'TKTBB-00023', 'nama' => 'TANAH KUBURAN TEMPAT BENDA BERSEJARAH'],
            ['kode' => 'TMUU-00024', 'nama' => 'TANAH MAKAM UMUM/KUBURAN UMUM'],
            ['kode' => 'TKL-00025', 'nama' => 'TANAH KUBURAN LAINNYA'],
            ['kode' => 'TP-00026', 'nama' => 'TANAH PERTANIAN'],
            ['kode' => 'SSTD-00027', 'nama' => 'SAWAH SATU TAHUN DITANAMI'],
            ['kode' => 'SDP-00028', 'nama' => 'SAWAH DITANAMI PADI'],
            ['kode' => 'SDP-00029', 'nama' => 'SAWAH DITANAMI PALAWIJA'],
            ['kode' => 'SDT-00030', 'nama' => 'SAWAH DITANAMI TEBU'],
            ['kode' => 'SDS-00031', 'nama' => 'SAWAH DITANAMI SAYURAN'],
            ['kode' => 'SDT-00032', 'nama' => 'SAWAH DITANAMI TEMBAKAU'],
            ['kode' => 'SDR-00033', 'nama' => 'SAWAH DITANAMI ROSELLA'],
            ['kode' => 'SDL-00034', 'nama' => 'SAWAH DITANAMI LAINNYA'],
            ['kode' => 'TK-00035', 'nama' => 'TANAH KERING/TEGALAN'],
            ['kode' => 'TKDB-00036', 'nama' => 'TANAH KERING DITANAMI BUAH-BUAHAN'],
            ['kode' => 'TKDT-00037', 'nama' => 'TANAH KERING DITANAMI TEMBAKAU'],
            ['kode' => 'TKDJ-00038', 'nama' => 'TANAH KERING DITANAMI JAGUNG'],
            ['kode' => 'TKDKP-00039', 'nama' => 'TANAH KERING DITANAMI KETELA POHON'],
            ['kode' => 'TKDKT-00040', 'nama' => 'TANAH KERING DITANAMI KACANG TANAH'],
            ['kode' => 'TKDKH-00041', 'nama' => 'TANAH KERING DITANAMI KACANG HIJAU'],
            ['kode' => 'TKDK-00042', 'nama' => 'TANAH KERING DITANAMI KEDELAI'],
            ['kode' => 'TKDUJ-00043', 'nama' => 'TANAH KERING DITANAMI UBI JALAR'],
            ['kode' => 'TKDK-00044', 'nama' => 'TANAH KERING DITANAMI KELADI'],
            ['kode' => 'TKDL-00045', 'nama' => 'TANAH KERING DITANAMI LAINNYA'],
            ['kode' => 'L-00046', 'nama' => 'LADANG'],
            ['kode' => 'LP-00047', 'nama' => 'LADANG PADI'],
            ['kode' => 'LJ-00048', 'nama' => 'LADANG JAGUNG'],
            ['kode' => 'LKP-00049', 'nama' => 'LADANG KETELA POHON'],
            ['kode' => 'LKT-00050', 'nama' => 'LADANG KACANG TANAH'],
            ['kode' => 'LKH-00051', 'nama' => 'LADANG KACANG HIJAU'],
            ['kode' => 'LK-00052', 'nama' => 'LADANG KEDELAI'],
            ['kode' => 'LUJ-00053', 'nama' => 'LADANG UBI JALAR'],
            ['kode' => 'LK-00054', 'nama' => 'LADANG KELADI'],
            ['kode' => 'LB-00055', 'nama' => 'LADANG BENGKUANG'],
            ['kode' => 'LA-00056', 'nama' => 'LADANG APEL'],
            ['kode' => 'LK-00057', 'nama' => 'LADANG KENTANG'],
            ['kode' => 'LJ-00058', 'nama' => 'LADANG JERUK'],
            ['kode' => 'LL-00059', 'nama' => 'LADANG LAINNYA'],
            ['kode' => 'TP-00060', 'nama' => 'TANAH PERKEBUNAN'],
            ['kode' => 'TPK-00061', 'nama' => 'TANAH PERKEBUNAN KARET'],
            ['kode' => 'TPK-00062', 'nama' => 'TANAH PERKEBUNAN KOPI'],
            ['kode' => 'TPK-00063', 'nama' => 'TANAH PERKEBUNAN KELAPA'],
            ['kode' => 'TPR-00064', 'nama' => 'TANAH PERKEBUNAN RANDU'],
            ['kode' => 'TPL-00065', 'nama' => 'TANAH PERKEBUNAN LADA'],
            ['kode' => 'TPT-00066', 'nama' => 'TANAH PERKEBUNAN TEH'],
            ['kode' => 'TPK-00067', 'nama' => 'TANAH PERKEBUNAN KINA'],
            ['kode' => 'TPC-00068', 'nama' => 'TANAH PERKEBUNAN COKLAT'],
            ['kode' => 'TPKS-00069', 'nama' => 'TANAH PERKEBUNAN KELAPA SAWIT'],
            ['kode' => 'TPS-00070', 'nama' => 'TANAH PERKEBUNAN SEREH'],
            ['kode' => 'TPC-00071', 'nama' => 'TANAH PERKEBUNAN CENGKEH'],
            ['kode' => 'TPP-00072', 'nama' => 'TANAH PERKEBUNAN PALA'],
            ['kode' => 'TPS-00073', 'nama' => 'TANAH PERKEBUNAN SAGU'],
            ['kode' => 'TPJM-00074', 'nama' => 'TANAH PERKEBUNAN JAMBU MENTE'],
            ['kode' => 'TPT-00075', 'nama' => 'TANAH PERKEBUNAN TENGKAWANG'],
            ['kode' => 'TPMKP-00076', 'nama' => 'TANAH PERKEBUNAN MINYAK KAYU PUTIH'],
            ['kode' => 'TPKM-00077', 'nama' => 'TANAH PERKEBUNAN KAYU MANIS'],
            ['kode' => 'TPP-00078', 'nama' => 'TANAH PERKEBUNAN PETAI'],
            ['kode' => 'TPL-00079', 'nama' => 'TANAH PERKEBUNAN LAINNYA'],
            ['kode' => 'TH-00080', 'nama' => 'TANAH HUTAN'],
            ['kode' => 'THL(JKU-00081', 'nama' => 'TANAH HUTAN LEBAT (DITANAMI JENIS KAYU UTAMA)'],
            ['kode' => 'THM-00082', 'nama' => 'TANAH HUTAN MERANTI'],
            ['kode' => 'THR-00083', 'nama' => 'TANAH HUTAN RASAMALA'],
            ['kode' => 'THB-00084', 'nama' => 'TANAH HUTAN BULIAN'],
            ['kode' => 'THM-00085', 'nama' => 'TANAH HUTAN MEDANG'],
            ['kode' => 'THJ-00086', 'nama' => 'TANAH HUTAN JELUTUNG'],
            ['kode' => 'THR-00087', 'nama' => 'TANAH HUTAN RAMIN'],
            ['kode' => 'THP-00088', 'nama' => 'TANAH HUTAN PUSPA'],
            ['kode' => 'THS-00089', 'nama' => 'TANAH HUTAN SUNINTEM'],
            ['kode' => 'THA-00090', 'nama' => 'TANAH HUTAN ALBENIA'],
            ['kode' => 'THKB-00091', 'nama' => 'TANAH HUTAN KAYU BESI/ULIN'],
            ['kode' => 'HLL-00092', 'nama' => 'HUTAN LEBAT LAINNYA'],
            ['kode' => 'THB-00093', 'nama' => 'TANAH HUTAN BELUKAR'],
            ['kode' => 'THS-00094', 'nama' => 'TANAH HUTAN SEMAK-SEMAK'],
            ['kode' => 'HB-00095', 'nama' => 'HUTAN BELUKAR'],
            ['kode' => 'HBL-00096', 'nama' => 'HUTAN BELUKAR LAINNYA'],
            ['kode' => 'HTJ-00097', 'nama' => 'HUTAN TANAMAN JENIS'],
            ['kode' => 'HTJ-00098', 'nama' => 'HUTAN TANAMAN JATI'],
            ['kode' => 'HTP-00099', 'nama' => 'HUTAN TANAMAN PINUS'],
            ['kode' => 'HTR-00100', 'nama' => 'HUTAN TANAMAN ROTAN'],
            ['kode' => 'HTJL-00101', 'nama' => 'HUTAN TANAMAN JENIS LAINNYA'],
            ['kode' => 'HASR-00102', 'nama' => 'HUTAN ALAM SEJENIS/HUTAN RAWA'],
            ['kode' => 'HB-00103', 'nama' => 'HUTAN BAKAU'],
            ['kode' => 'HC(TD-00104', 'nama' => 'HUTAN CEMARA (YANG TIDAK DITANAMAN)'],
            ['kode' => 'HG-00105', 'nama' => 'HUTAN GALAM'],
            ['kode' => 'HN-00106', 'nama' => 'HUTAN NIPAH'],
            ['kode' => 'HB-00107', 'nama' => 'HUTAN BAMBU'],
            ['kode' => 'HR-00108', 'nama' => 'HUTAN ROTAN'],
            ['kode' => 'HASL-00109', 'nama' => 'HUTAN ALAM SEJENIS LAINNYA'],
            ['kode' => 'HUPK-00110', 'nama' => 'HUTAN UNTUK PENGGUNAAN KHUSUS'],
            ['kode' => 'HC-00111', 'nama' => 'HUTAN CADANGAN'],
            ['kode' => 'HL-00112', 'nama' => 'HUTAN LINDUNG'],
            ['kode' => 'HCA-00113', 'nama' => 'HUTAN CAGAR ALAM'],
            ['kode' => 'HTW-00114', 'nama' => 'HUTAN TAMAN WISATA'],
            ['kode' => 'HTB-00115', 'nama' => 'HUTAN TAMAN BURUNG'],
            ['kode' => 'HSMS-00116', 'nama' => 'HUTAN SUAKA MARGA SATWA'],
            ['kode' => 'HTN-00117', 'nama' => 'HUTAN TAMAN NASIONAL'],
            ['kode' => 'HP-00118', 'nama' => 'HUTAN PRODUKSI'],
            ['kode' => 'HUPKL-00119', 'nama' => 'HUTAN UNTUK PENGGUNAAN KHUSUS LAINNYA'],
            ['kode' => 'TKC-00120', 'nama' => 'TANAH KEBUN CAMPURAN'],
            ['kode' => 'TYTAJP-00121', 'nama' => 'TANAH YANG TIDAK ADA JARINGAN PENGAIRAN'],
            ['kode' => 'TR-00122', 'nama' => 'TANAMAN RUPA-RUPA'],
            ['kode' => 'TKCL-00123', 'nama' => 'TANAH KEBUN CAMPURAN LAINNYA'],
            ['kode' => 'TLBJL-00124', 'nama' => 'TUMBUH LIAR BERCAMPUR JENIS LAIN'],
            ['kode' => 'JTR&TJMYM-00125', 'nama' => 'JENIS TANAMAN RUPA-RUPA & TIDAK JELAS MANA YANG MENONJOL'],
            ['kode' => 'TLP-00126', 'nama' => 'TANAMAN LUAR PERKARANGAN'],
            ['kode' => 'TLBJL-00127', 'nama' => 'TUMBUH LIAR BERCAMPUR JENIS LAINNYA'],
            ['kode' => 'TKI-00128', 'nama' => 'TANAH KOLAM IKAN'],
            ['kode' => 'T-00129', 'nama' => 'TAMBAK'],
            ['kode' => 'TL-00130', 'nama' => 'TAMBAK LAINNYA'],
            ['kode' => 'AT-00131', 'nama' => 'AIR TAWAR'],
            ['kode' => 'KAT-00132', 'nama' => 'KOLAM AIR TAWAR'],
            ['kode' => 'ATL-00133', 'nama' => 'AIR TAWAR LAINNYA'],
            ['kode' => 'TD/R-00134', 'nama' => 'TANAH DANAU / RAWA'],
            ['kode' => 'R-00135', 'nama' => 'RAWA'],
            ['kode' => 'RL-00136', 'nama' => 'RAWA LAINNYA'],
            ['kode' => 'D-00137', 'nama' => 'DANAU'],
            ['kode' => 'S-00138', 'nama' => 'SANAU/SITU'],
            ['kode' => 'W-00139', 'nama' => 'WADUK'],
            ['kode' => 'DL-00140', 'nama' => 'DANAU LAINNYA'],
            ['kode' => 'TT/R-00141', 'nama' => 'TANAH TANDUS / RUSAK'],
            ['kode' => 'TT-00142', 'nama' => 'TANAH TANDUS'],
            ['kode' => 'B-00143', 'nama' => 'BERBATU-BATU'],
            ['kode' => 'L-00144', 'nama' => 'LONGSOR'],
            ['kode' => 'TL-00145', 'nama' => 'TANAH LAHAR'],
            ['kode' => 'TB-00146', 'nama' => 'TANAH BERPASIR/PASIR'],
            ['kode' => 'TP-00147', 'nama' => 'TANAH PENGAMBILAN/KUASI'],
            ['kode' => 'TTL-00148', 'nama' => 'TANAH TANDUS LAINNYA'],
            ['kode' => 'TR-00149', 'nama' => 'TANAH RUSAK'],
            ['kode' => 'TYT-00150', 'nama' => 'TANAH YANG TEREROSI/LONGSOR'],
            ['kode' => 'BT-00151', 'nama' => 'BEKAS TAMBANG/GALIAN'],
            ['kode' => 'BS-00152', 'nama' => 'BEKAS SAWAH/RAWA'],
            ['kode' => 'TRL-00153', 'nama' => 'TANAH RUSAK LAINNYA'],
            ['kode' => 'TADPR-00154', 'nama' => 'TANAH ALANG-ALANG DAN PADANG RUMPUT'],
            ['kode' => 'A-00155', 'nama' => 'ALANG-ALANG'],
            ['kode' => 'AL-00156', 'nama' => 'ALANG-ALANG LAINNYA'],
            ['kode' => 'PR-00157', 'nama' => 'PADANG RUMPUT'],
            ['kode' => 'SB-00158', 'nama' => 'SEMAK BELUKAR'],
            ['kode' => 'PRL-00159', 'nama' => 'PADANG RUMPUT LAINNYA'],
            ['kode' => 'TP-00160', 'nama' => 'TANAH PERTAMBANGAN'],
            ['kode' => 'TPI-00161', 'nama' => 'TANAH PERTAMBANGAN INTAN'],
            ['kode' => 'TPE-00162', 'nama' => 'TANAH PERTAMBANGAN EMAS'],
            ['kode' => 'TPP-00163', 'nama' => 'TANAH PERTAMBANGAN PERAK'],
            ['kode' => 'TPN-00164', 'nama' => 'TANAH PERTAMBANGAN NEKEL'],
            ['kode' => 'TPT-00165', 'nama' => 'TANAH PERTAMBANGAN TIMAH'],
            ['kode' => 'TPU-00166', 'nama' => 'TANAH PERTAMBANGAN URANIUM'],
            ['kode' => 'TPT-00167', 'nama' => 'TANAH PERTAMBANGAN TEMBAGA'],
            ['kode' => 'TPMB-00168', 'nama' => 'TANAH PERTAMBANGAN MINYAK BUMI'],
            ['kode' => 'TPBB-00169', 'nama' => 'TANAH PERTAMBANGAN BATU BARA'],
            ['kode' => 'TPK-00170', 'nama' => 'TANAH PERTAMBANGAN KOSLIN'],
            ['kode' => 'TPBBB-00171', 'nama' => 'TANAH PERTAMBANGAN BATU BARA BERHARGA'],
            ['kode' => 'TPPB-00172', 'nama' => 'TANAH PERTAMBANGAN PASIR BERHARGA'],
            ['kode' => 'TPL-00173', 'nama' => 'TANAH PERTAMBANGAN LAINNYA'],
            ['kode' => 'TUBG-00174', 'nama' => 'TANAH UNTUK BANGUNAN GEDUNG'],
            ['kode' => 'TBPTT-00175', 'nama' => 'TANAH BANGUNAN PERUMAHAN/GDG. TEMPAT TINGGAL'],
            ['kode' => 'TBM-00176', 'nama' => 'TANAH BANGUNAN MESS'],
            ['kode' => 'TBW-00177', 'nama' => 'TANAH BANGUNAN WISMA'],
            ['kode' => 'TBA-00178', 'nama' => 'TANAH BANGUNAN ASRAMA'],
            ['kode' => 'TBP-00179', 'nama' => 'TANAH BANGUNAN PERISTIRAHATAN'],
            ['kode' => 'TBB-00180', 'nama' => 'TANAH BANGUNAN BUNGALAOW'],
            ['kode' => 'TBC-00181', 'nama' => 'TANAH BANGUNAN COTTAGE'],
            ['kode' => 'TBRTTL-00182', 'nama' => 'TANAH BANGUNAN RUMAH TEMPAT TINGGAL LAINNYA'],
            ['kode' => 'TUBGP-00183', 'nama' => 'TANAH UNTUK BANGUNAN GEDUNG PERDAGANGAN'],
            ['kode' => 'TBP-00184', 'nama' => 'TANAH BANGUNAN PASAR'],
            ['kode' => 'TBPT-00185', 'nama' => 'TANAH BANGUNAN PERTOKOAN/RUMAH TOKO'],
            ['kode' => 'TBG-00186', 'nama' => 'TANAH BANGUNAN GUDANG'],
            ['kode' => 'TBB-00187', 'nama' => 'TANAH BANGUNAN BIOSKOP'],
            ['kode' => 'TBH-00188', 'nama' => 'TANAH BANGUNAN HOTEL/PENGINAPAN'],
            ['kode' => 'TBTD-00189', 'nama' => 'TANAH BANGUNAN TERMINAL DARAT'],
            ['kode' => 'TBTL-00190', 'nama' => 'TANAH BANGUNAN TERMINAL LAUT'],
            ['kode' => 'TBGK-00191', 'nama' => 'TANAH BANGUNAN GEDUNG KESENIAN'],
            ['kode' => 'TBGP-00192', 'nama' => 'TANAH BANGUNAN GEDUNG PAMERAN'],
            ['kode' => 'TBGPP-00193', 'nama' => 'TANAH BANGUNAN GEDUNG PUSAT PERBELANJAAN'],
            ['kode' => 'TBA-00194', 'nama' => 'TANAH BANGUNAN APOTIK'],
            ['kode' => 'TBGPL-00195', 'nama' => 'TANAH BANGUNAN GEDUNG PERDAGANGAN LAINNYA'],
            ['kode' => 'TUBI-00196', 'nama' => 'TANAH UNTUK BANGUNAN INDUSTRI'],
            ['kode' => 'TBIM-00197', 'nama' => 'TANAH BANGUNAN INDUSTRI MAKANAN'],
            ['kode' => 'TBIM-00198', 'nama' => 'TANAH BANGUNAN INDUSTRI MINUMAN'],
            ['kode' => 'TBIR-00199', 'nama' => 'TANAH BANGUNAN INDUSTRI/ALAT RT.'],
            ['kode' => 'TBIP-00200', 'nama' => 'TANAH BANGUNAN INDUSTRI PAKAIAN/GARMENT'],
            ['kode' => 'TBIB-00201', 'nama' => 'TANAH BANGUNAN INDUSTRI BESI/LOGAM'],
            ['kode' => 'TBIB-00202', 'nama' => 'TANAH BANGUNAN INDUSTRI BAJA'],
            ['kode' => 'TBIP-00203', 'nama' => 'TANAH BANGUNAN INDUSTRI PENGALENGAN'],
            ['kode' => 'TBIB-00204', 'nama' => 'TANAH BANGUNAN INDUSTRI BENGKEL'],
            ['kode' => 'TBIP -00205', 'nama' => 'TANAH BANGUNAN INDUSTRI PENYULINGAN  MINYAK'],
            ['kode' => 'TBIS-00206', 'nama' => 'TANAH BANGUNAN INDUSTRI SEMEN'],
            ['kode' => 'TBIBB-00207', 'nama' => 'TANAH BANGUNAN INDUSTRI BATU BATA/BATAKO'],
            ['kode' => 'TBIG-00208', 'nama' => 'TANAH BANGUNAN INDUSTRI GENTENG'],
            ['kode' => 'TBIP-00209', 'nama' => 'TANAH BANGUNAN INDUSTRI PERCETAKAN'],
            ['kode' => 'TBIT-00210', 'nama' => 'TANAH BANGUNAN INDUSTRI TESKTIL'],
            ['kode' => 'TBIO-00211', 'nama' => 'TANAH BANGUNAN INDUSTRI OBAT-OBATAN'],
            ['kode' => 'TBIAOR-00212', 'nama' => 'TANAH BANGUNAN INDUSTRI ALAT OLAH RAGA'],
            ['kode' => 'TBIKO-00213', 'nama' => 'TANAH BANGUNAN INDUSTRI KENDARAAN/ OTOMOTIF'],
            ['kode' => 'TBIP-00214', 'nama' => 'TANAH BANGUNAN INDUSTRI PERSENJATAAN'],
            ['kode' => 'TBIKU-00215', 'nama' => 'TANAH BANGUNAN INDUSTRI KAPAL UDARA'],
            ['kode' => 'TBIKL-00216', 'nama' => 'TANAH BANGUNAN INDUSTRI KAPAL LAUT'],
            ['kode' => 'TBIKA-00217', 'nama' => 'TANAH BANGUNAN INDUSTRI KAPAL API'],
            ['kode' => 'TBIK-00218', 'nama' => 'TANAH BANGUNAN INDUSTRI KERAMIK/MARMER'],
            ['kode' => 'TBIL-00219', 'nama' => 'TANAH BANGUNAN INDUSTRI LAINNYA'],
            ['kode' => 'TUBTK-00220', 'nama' => 'TANAH UNTUK BANGUNAN TEMPAT KERJA/JASA'],
            ['kode' => 'TBKP-00221', 'nama' => 'TANAH BANGUNAN KANTOR PEMERINTAH'],
            ['kode' => 'TBS-00222', 'nama' => 'TANAH BANGUNAN SEKOLAH'],
            ['kode' => 'TBRS-00223', 'nama' => 'TANAH BANGUNAN RUMAH SAKIT'],
            ['kode' => 'TBTI-00224', 'nama' => 'TANAH BANGUNAN TEMPAT IBADAH'],
            ['kode' => 'TBD-00225', 'nama' => 'TANAH BANGUNAN DERMAGA'],
            ['kode' => 'TBPU-00226', 'nama' => 'TANAH BANGUNAN PELABUHAN UDARA'],
            ['kode' => 'TBOR-00227', 'nama' => 'TANAH BANGUNAN OLAH RAGA'],
            ['kode' => 'TBT-00228', 'nama' => 'TANAH BANGUNAN TAMAN/WISATA/REKREASI'],
            ['kode' => 'TBBS-00229', 'nama' => 'TANAH BANGUNAN BALAI SIDANG/PERTEMUAN'],
            ['kode' => 'TBBN-00230', 'nama' => 'TANAH BANGUNAN BALAI NIKAH'],
            ['kode' => 'TBP-00231', 'nama' => 'TANAH BANGUNAN PUSKESMAS/POSYANDU'],
            ['kode' => 'TBP-00232', 'nama' => 'TANAH BANGUNAN POLIKLINIK'],
            ['kode' => 'TBL-00233', 'nama' => 'TANAH BANGUNAN LABORATURIUM'],
            ['kode' => 'TBF-00234', 'nama' => 'TANAH BANGUNAN FUMIGASI/STERLISASI'],
            ['kode' => 'TBK-00235', 'nama' => 'TANAH BANGUNAN KARANTINA'],
            ['kode' => 'TBBP K-00236', 'nama' => 'TANAH BANGUNAN BANGSAL PENGOLAHAN  PONDON KERJA'],
            ['kode' => 'TBKH-00237', 'nama' => 'TANAH BANGUNAN KANDANG HEWAN'],
            ['kode' => 'TBP-00238', 'nama' => 'TANAH BANGUNAN-BANGUNAN PEMBIBITAN'],
            ['kode' => 'TBRP-00239', 'nama' => 'TANAH BANGUNAN RUMAH PENDINGIN'],
            ['kode' => 'TBRP-00240', 'nama' => 'TANAH BANGUNAN RUMAH PENGERING'],
            ['kode' => 'TBSP-00241', 'nama' => 'TANAH BANGUNAN STASIUN PENELITIAN'],
            ['kode' => 'TBGPI-00242', 'nama' => 'TANAH BANGUNAN GEDUNG PELELANGAN IKAN'],
            ['kode' => 'TBPJJ-00243', 'nama' => 'TANAH BANGUNAN POS JAGA/MENARA JAGA'],
            ['kode' => 'TBTKL-00244', 'nama' => 'TANAH BANGUNAN TEMPAT KERJA LAINNYA'],
            ['kode' => 'TK-00245', 'nama' => 'TANAH KOSONG'],
            ['kode' => 'TS-00246', 'nama' => 'TANAH SAWAH'],
            ['kode' => 'TT-00247', 'nama' => 'TANAH TEGALAN'],
            ['kode' => 'TK-00248', 'nama' => 'TANAH KEBUN'],
            ['kode' => 'KP-00249', 'nama' => 'KEBUN PEMBIBITAN'],
            ['kode' => 'TKYTD-00250', 'nama' => 'TANAH KOSONG YANG TIDAK DIUSAHAKAN'],
            ['kode' => 'TP-00251', 'nama' => 'TANAH PETERNAKAN'],
            ['kode' => 'TPL-00252', 'nama' => 'TANAH PETERNAKAN LAINNYA'],
            ['kode' => 'TBP-00253', 'nama' => 'TANAH BANGUNAN PENGAIRAN'],
            ['kode' => 'TW-00254', 'nama' => 'TANAH WADUK'],
            ['kode' => 'TKB-00255', 'nama' => 'TANAH KOMPLEK BENDUNGAN'],
            ['kode' => 'TJ-00256', 'nama' => 'TANAH JARINGAN/SALURAN'],
            ['kode' => 'TBPL-00257', 'nama' => 'TANAH BANGUNAN PENGAIRAN LAINNYA'],
            ['kode' => 'TBJDJ-00258', 'nama' => 'TANAH BANGUNAN JALAN DAN JEMBATAN'],
            ['kode' => 'TJ-00259', 'nama' => 'TANAH JALAN'],
            ['kode' => 'TJ-00260', 'nama' => 'TANAH JEMBATAN'],
            ['kode' => 'TBJDJL-00261', 'nama' => 'TANAH BANGUNAN JALAN DAN JEMBATAN LAINNYA'],
            ['kode' => 'TLD-00262', 'nama' => 'TANAH LEMBIRAN/BANTARAN/LEPE-LEPE/SETREN DST'],
            ['kode' => 'TLP-00263', 'nama' => 'TANAH LEMBIRAN PENGAIRAN'],
            ['kode' => 'TLJDJ-00264', 'nama' => 'TANAH LEMBIRAN JALAN DAN JEMBATAN'],
            ['kode' => 'TLL-00265', 'nama' => 'TANAH LEMBIRAN LAINNYA'],
            ['kode' => 'TUBBG-00266', 'nama' => 'TANAH UNTUK BANGUNAN BUKAN GEDUNG'],
            ['kode' => 'TLOR-00267', 'nama' => 'TANAH LAPANGAN OLAH RAGA'],
            ['kode' => 'TLT-00268', 'nama' => 'TANAH LAPANGAN TENIS'],
            ['kode' => 'TLB-00269', 'nama' => 'TANAH LAPANGAN BASKET'],
            ['kode' => 'TLB-00270', 'nama' => 'TANAH LAPANGAN BADMINTON/BULUTANGKIS'],
            ['kode' => 'TLG-00271', 'nama' => 'TANAH LAPANGAN GOLF'],
            ['kode' => 'TLSB-00272', 'nama' => 'TANAH LAPANGAN SEPAK BOLA'],
            ['kode' => 'TLBV-00273', 'nama' => 'TANAH LAPANGAN BOLA VOLLY'],
            ['kode' => 'TLST-00274', 'nama' => 'TANAH LAPANGAN SEPAK TAKRAW'],
            ['kode' => 'TLPK-00275', 'nama' => 'TANAH LAPANGAN PACUAN KUDA'],
            ['kode' => 'TLBS-00276', 'nama' => 'TANAH LAPANGAN BALAP SEPEDA'],
            ['kode' => 'TLA-00277', 'nama' => 'TANAH LAPANGAN ATLETIK'],
            ['kode' => 'TLS-00278', 'nama' => 'TANAH LAPANGAN SOFTBALL'],
            ['kode' => 'TLOL-00279', 'nama' => 'TANAH LAPANGAN OLAHRAGA LAINNYA'],
            ['kode' => 'TLP-00280', 'nama' => 'TANAH LAPANGAN PARKIR'],
            ['kode' => 'TLPKB-00281', 'nama' => 'TANAH LAPANGAN PARKIR KONTRUKSI BETON'],
            ['kode' => 'TLPKA-00282', 'nama' => 'TANAH LAPANGAN PARKIR KONTRUKSI ASPAL'],
            ['kode' => 'TLPS(B-00283', 'nama' => 'TANAH LAPANGAN PARKIR SIRTU (PASIR BATU)'],
            ['kode' => 'TLPK-00284', 'nama' => 'TANAH LAPANGAN PARKIR KONBLOK'],
            ['kode' => 'TLPTK-00285', 'nama' => 'TANAH LAPANGAN PARKIR TANAH KERAS'],
            ['kode' => 'TLPL-00286', 'nama' => 'TANAH LAPANGAN PARKIR LAINNYA'],
            ['kode' => 'TLPB-00287', 'nama' => 'TANAH LAPANGAN PENIMBUN BARANG'],
            ['kode' => 'TLPBBD-00288', 'nama' => 'TANAH LAPANGAN PENIMBUN BARANG BELUM DIOLAH'],
            ['kode' => 'TLPBJ-00289', 'nama' => 'TANAH LAPANGAN PENIMBUN BARANG JADI'],
            ['kode' => 'TLPPS-00290', 'nama' => 'TANAH LAPANGAN PENIMBUN PEMBUANGAN SAMPAH'],
            ['kode' => 'TLPBB-00291', 'nama' => 'TANAH LAPANGAN PENIMBUN BAHAN BANGUNAN'],
            ['kode' => 'TLPBB-00292', 'nama' => 'TANAH LAPANGAN PENIMBUN BARANG BUKTI'],
            ['kode' => 'TLPBL-00293', 'nama' => 'TANAH LAPANGAN PENIMBUN BARANG LAINNYA'],
            ['kode' => 'TLPDSA-00294', 'nama' => 'TANAH LAPANGAN PEMANCAR DAN STUDIO ALAM'],
            ['kode' => 'TLPT-00295', 'nama' => 'TANAH LAPANGAN PEMANCAR TV/RADIO/RADAR'],
            ['kode' => 'TLSA-00296', 'nama' => 'TANAH LAPANGAN STUDIO ALAM'],
            ['kode' => 'TLPL-00297', 'nama' => 'TANAH LAPANGAN PEMANCAR LAINNYA'],
            ['kode' => 'TLPDSAL-00298', 'nama' => 'TANAH LAPANGAN PEMANCAR DAN STUDIO ALAM LAINNYA'],
            ['kode' => 'TLP-00299', 'nama' => 'TANAH LAPANGAN PENGUJIAN/PENGOLAHAN'],
            ['kode' => 'TLPK -00300', 'nama' => 'TANAH LAPANGAN PENGUJIAN KENDARAAN  BERMOTOR'],
            ['kode' => 'TLPBB-00301', 'nama' => 'TANAH LAPANGAN PENGELOLAAN BAHAN BANGUNAN'],
            ['kode' => 'TLPL-00302', 'nama' => 'TANAH LAPANGAN PENGUJIAN/PENGOLAHAN LAINNYA'],
            ['kode' => 'TLT-00303', 'nama' => 'TANAH LAPANGAN TERBANG'],
            ['kode' => 'TLTP-00304', 'nama' => 'TANAH LAPANGAN TERBANG PERINTIS'],
            ['kode' => 'TLK-00305', 'nama' => 'TANAH LAPNGAN KOMERSIAL'],
            ['kode' => 'TLTK-00306', 'nama' => 'TANAH LAPANGAN TERBANG KHUSUS/MILITER'],
            ['kode' => 'TLTOR-00307', 'nama' => 'TANAH LAOPANGAN TERBANG OLAH RAGA'],
            ['kode' => 'TLTP-00308', 'nama' => 'TANAH LAPANGAN TERBANG PENDIDIKAN'],
            ['kode' => 'TLTL-00309', 'nama' => 'TANAH LAPANGAN TERBANG LAINNYA'],
            ['kode' => 'TUBJ-00310', 'nama' => 'TANAH UNTUK BANGUNAN JALAN'],
            ['kode' => 'TUJN-00311', 'nama' => 'TANAH UNTUK JALAN NASIONAL'],
            ['kode' => 'TUJP-00312', 'nama' => 'TANAH UNTUK JALAN PROPINSI'],
            ['kode' => 'TUJK-00313', 'nama' => 'TANAH UNTUK JALAN KABUPATEN'],
            ['kode' => 'TUJK-00314', 'nama' => 'TANAH UNTUK JALAN KOTAMADYA'],
            ['kode' => 'TUJD-00315', 'nama' => 'TANAH UNTUK JALAN DESA'],
            ['kode' => 'TUJT-00316', 'nama' => 'TANAH UNTUK JALAN TOL'],
            ['kode' => 'TUJKA-00317', 'nama' => 'TANAH UNTUK JALAN KERETA API/LORI'],
            ['kode' => 'TUJLPPT-00318', 'nama' => 'TANAH UNTUK JALAN LANDASAN PACU PESAWAT TERBANG'],
            ['kode' => 'TUJK-00319', 'nama' => 'TANAH UNTUK JALAN KHUSUS/KOMPLEK'],
            ['kode' => 'TUBJL-00320', 'nama' => 'TANAH UNTUK BANGUNAN JALAN LAINNYA'],
            ['kode' => 'TUBA-00321', 'nama' => 'TANAH UNTUK BANGUNAN AIR'],
            ['kode' => 'TUBAI-00322', 'nama' => 'TANAH UNTUK BANGUNAN AIR IRIGASI'],
            ['kode' => 'TUBPPS-00323', 'nama' => 'TANAH UNTUK BANGUNAN PENGAIRAN PASANG SURUT'],
            ['kode' => 'TUBPRDP-00324', 'nama' => 'TANAH UNTUK BANGUNAN PENGEMBANGAN RAWA DAN POLDER'],
            ['kode' => 'TUBPSDPBA-00325', 'nama' => 'TANAH UNTUK BANGUNAN PENGAMAN SUNGAI DAN PENANGGULANGAN BENCANA ALAM'],
            ['kode' => 'TUBPSADAT-00326', 'nama' => 'TANAH UNTUK BANGUNAN PENGEMBANGAN SUMBER AIR DAN AIR TNH'],
            ['kode' => 'TUBABB-00327', 'nama' => 'TANAH UNTUK BANGUNAN AIR BERSIH/AIR BAKU'],
            ['kode' => 'TUBAK-00328', 'nama' => 'TANAH UNTUK BANGUNAN AIR KOTOR'],
            ['kode' => 'TUBAL-00329', 'nama' => 'TANAH UNTUK BANGUNAN AIR LAINNYA'],
            ['kode' => 'TUBI-00330', 'nama' => 'TANAH UNTUK BANGUNAN INSTALASI'],
            ['kode' => 'TUBIABB-00331', 'nama' => 'TANAH UNTUK BANGUNAN INSTALASI AIR BERSIH/AIR BAKU'],
            ['kode' => 'TUBIAKL-00332', 'nama' => 'TANAH UNTUK BANGUNAN INSTALASI AIR KOTOR/AIR LIMBAH'],
            ['kode' => 'TUBIPS-00333', 'nama' => 'TANAH UNTUK BANGUNAN INSTALASI PENGELOHAN SAMPAH'],
            ['kode' => 'TUBIPBB-00334', 'nama' => 'TANAH UNTUK BANGUNAN INSTALASI PENGOLAHAN BAHAN BANGUNAN'],
            ['kode' => 'TUBIL-00335', 'nama' => 'TANAH UNTUK BANGUNAN INSTALASI LISTRIK'],
            ['kode' => 'TUBIGL-00336', 'nama' => 'TANAH UNTUK BANGUNAN INSTALASI GARDU LISTRIK'],
            ['kode' => 'TUBPL-00337', 'nama' => 'TANAH UNTUK BANGUNAN PANGOLAHAN LIMBAH'],
            ['kode' => 'TUBIL-00338', 'nama' => 'TANAH UNTUK BANGUNAN INSTALASI LAINNYA'],
            ['kode' => 'TUBJ-00339', 'nama' => 'TANAH UNTUK BANGUNAN JARINGAN'],
            ['kode' => 'TUBJABB-00340', 'nama' => 'TANAH UNTUK BANGUNAN JARINGAN AIR BERSIH/AIR BAKU'],
            ['kode' => 'TUBJK-00341', 'nama' => 'TANAH UNTUK BANGUNAN JARINGAN KOMUNIKASI'],
            ['kode' => 'TUBJL-00342', 'nama' => 'TANAH UNTUK BANGUNAN JARINGAN LISTRIK'],
            ['kode' => 'TUBJG-00343', 'nama' => 'TANAH UNTUK BANGUNAN JARINGAN GAS/BBM'],
            ['kode' => 'TUBJL-00344', 'nama' => 'TANAH UNTUK BANGUNAN JARINGAN LAINNYA'],
            ['kode' => 'TUBB-00345', 'nama' => 'TANAH UNTUK BANGUNAN BERSEJARAH'],
            ['kode' => 'TUM-00346', 'nama' => 'TANAH UNTUK MONUMEN'],
            ['kode' => 'TUTP-00347', 'nama' => 'TANAH UNTUK TUGU PERINGATAN'],
            ['kode' => 'TUTBW-00348', 'nama' => 'TANAH UNTUK TUGU BATAS WILAYAH'],
            ['kode' => 'TUC-00349', 'nama' => 'TANAH UNTUK CANDI'],
            ['kode' => 'TUBM-00350', 'nama' => 'TANAH UNTUK BANGUNAN MOSEUM'],
            ['kode' => 'TUBBL-00351', 'nama' => 'TANAH UNTUK BANGUNAN BERSEJARAH LAINNYA'],
            ['kode' => 'TUBGOR-00352', 'nama' => 'TANAH UNTUK BANGUNAN GEDUNG OLAH RAGA'],
            ['kode' => 'TBSORT-00353', 'nama' => 'TANAH BANGUNAN SARANA OLAOH RAGA TERBATAS'],
            ['kode' => 'TBSORT-00354', 'nama' => 'TANAH BANGUNAN SARANA OLAH RAGA TERBUKA'],
            ['kode' => 'TBSORL-00355', 'nama' => 'TANAH BANGUNAN SARANA OLAH RAGA LAINNYA'],
            ['kode' => 'TUBTI-00356', 'nama' => 'TANAH UNTUK BANGUNAN TEMPAT IBADAH'],
            ['kode' => 'TUBM-00357', 'nama' => 'TANAH UNTUK BANGUNAN MESJID'],
            ['kode' => 'TUBG-00358', 'nama' => 'TANAH UNTUK BANGUNAN GEREJA'],
            ['kode' => 'TUBP-00359', 'nama' => 'TANAH UNTUK BANGUNAN PURA'],
            ['kode' => 'TUBV-00360', 'nama' => 'TANAH UNTUK BANGUNAN VIHARA'],
            ['kode' => 'TUBK-00361', 'nama' => 'TANAH UNTUK BANGUNAN KLENTENG/KUIL'],
            ['kode' => 'TUBK-00362', 'nama' => 'TANAH UNTUK BANGUNAN KREMATORIUM'],
            ['kode' => 'TUBTIL-00363', 'nama' => 'TANAH UNTUK BANGUNAN TAMPAT IBADAH LAINNYA'],
            ['kode' => 'TPL-00364', 'nama' => 'TANAH PENGGUNAAN LAINNYA'],
            ['kode' => 'P-00365', 'nama' => 'PENGGALIAN'],
            ['kode' => 'TAH-00366', 'nama' => 'TEMPAT AIR HANGAT'],
            ['kode' => 'TUJT-00367', 'nama' => 'TANAH UNTUK JALAN TOL'],
            ['kode' => 'TUM-00368', 'nama' => 'TANAH UNTUK MONUMEN'],
            ['kode' => 'TUTBW-00369', 'nama' => 'TANAH UNTUK TUGU BATAS WILAYAH'],
            ['kode' => 'TUTP-00370', 'nama' => 'TANAH UNTUK TUGU PERINGATAN'],
            ['kode' => 'TW-00371', 'nama' => 'TANAH WADUK'],
            ['kode' => 'TYT-00372', 'nama' => 'TANAH YANG TEREROSI/LONGSOR'],
            ['kode' => 'TYTAJP-00373', 'nama' => 'TANAH YANG TIDAK ADA JARINGAN PENGAIRAN'],
            ['kode' => 'TLP-00374', 'nama' => 'TANAMAN LUAR PERKARANGAN'],
            ['kode' => 'TR-00375', 'nama' => 'TANAMAN RUPA-RUPA'],
            ['kode' => 'TAH-00376', 'nama' => 'TEMPAT AIR HANGAT'],
            ['kode' => 'TLBJL-00377', 'nama' => 'TUMBUH LIAR BERCAMPUR JENIS LAIN'],
            ['kode' => 'TLBJL-00378', 'nama' => 'TUMBUH LIAR BERCAMPUR JENIS LAINNYA'],
            ['kode' => 'W-00379', 'nama' => 'WADUK'],
        ];
        foreach ($data as $item) {
            InvKategoriTanah::create([
                'kode' => $item['kode'],
                'nama' => $item['nama']
            ]);
        }
    }
}