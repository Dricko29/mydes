<?php

namespace App\Http\Controllers\Desa\Surat;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\LogSurat;
use App\Models\NomorSurat;
use App\Models\Penduduk;
use PhpOffice\PhpWord\TemplateProcessor;

class CetakSuratBiodataController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $penduduk = Penduduk::find($request->penduduk_id);
        $keluarga = Keluarga::where('id', $penduduk->keluarga_id)->firstOrFail();
        $kepala = Penduduk::where('keluarga_id', $keluarga->id)->where('attr_hubungan_id', 1)->first();

        $nomor_surat = NomorSurat::create([
            'surat_id' => 1
        ]);
        LogSurat::create([
            'penduduk_id' => $penduduk->id,
            'surat_id' => 1,
            'pegawai_id' => 1,
        ]);
        // Creating the new document...
        $phpWord = new TemplateProcessor('template-biodata.docx');

        /* Note: any element you append to a document must reside inside of a Section. */

        // head
        $phpWord->setValue('kab', Str::upper(settings()->group('desa')->get('nama_kabupaten')));
        $phpWord->setValue('kec', Str::upper(settings()->group('desa')->get('nama_kecamatan')));
        $phpWord->setValue('des', Str::upper(settings()->group('desa')->get('nama_desa')));
        $phpWord->setValue('alamat_kantor', Str::upper(settings()->group('desa')->get('alamat_kantor')));
        $phpWord->setImageValue('logo', array('path' => asset(settings()->group('umum')->get('app_logo')), 'height' => 120, 'ratio' => false));

        // keluarga
        $phpWord->setValue('nomor_surat', Str::upper($nomor_surat->nomor));
        $phpWord->setValue('judul_surat', Str::upper('surat biodata penduduk'));
        $phpWord->setValue('nama_kepala_keluarga', Str::ucfirst($kepala->nama));
        $phpWord->setValue('no_keluarga', $penduduk->keluarga->no_keluarga);
        $phpWord->setValue('alamat', '');
        $phpWord->setValue('desa', Str::ucfirst('GOA BOMA '));
        $phpWord->setValue('kabupaten', Str::ucfirst('BENGKAYANG'));
        $phpWord->setValue('kecamatan', Str::ucfirst('MONTERADO'));

        // individu
        $phpWord->setValue('nama_lengkap', Str::ucfirst($penduduk->nama));
        $phpWord->setValue('nik', $penduduk->nik);
        $phpWord->setValue('alamat_sebelumnya', Str::ucfirst('GOA BOMA'));
        $phpWord->setValue('paspor', $penduduk->paspor);
        $phpWord->setValue('tanggal_paspor', Carbon::parse($penduduk->tanggal_paspor)->format('d-m-Y'));
        $phpWord->setValue('kelamin', Str::ucfirst($penduduk->attrKelamin->nama));
        $phpWord->setValue('tempat_lahir', Str::ucfirst($penduduk->tempat_lahir));
        $phpWord->setValue('tanggal_lahir', Carbon::parse('1998-07-29')->format('d-m-Y'));
        $phpWord->setValue('no_akta_lahir', 'GGFSF-446546');
        $phpWord->setValue('golongan_darah', 'AB');
        $phpWord->setValue('agama', Str::ucfirst('KRISTEN'));
        $phpWord->setValue('status', Str::ucfirst('HIDUP'));
        $phpWord->setValue('no_akta_pernikahan', '');
        $phpWord->setValue('tanggal_pernikahan', Carbon::parse('1998-07-29')->format('d-m-Y'));
        $phpWord->setValue('no_akta_perceraian', '');
        $phpWord->setValue('tanggal_perceraian', Carbon::parse('1998-07-29')->format('d-m-Y'));
        $phpWord->setValue('hubungan', Str::ucfirst('ANAK'));
        $phpWord->setValue('cacat', Str::ucfirst('-'));
        $phpWord->setValue('pendidikan_kk', Str::ucfirst('TAMAT SD'));
        $phpWord->setValue('pekerjaan', Str::ucfirst('PETANI'));
        $phpWord->setValue('nama_ibu', Str::ucfirst('TINI'));
        $phpWord->setValue('nik_ibu', '454545645646446');
        $phpWord->setValue('nama_ayah', Str::ucfirst('JOE'));
        $phpWord->setValue('nik_ayah', '454545645646446');


        $phpWord->setValue('tanggal', Carbon::now()->isoFormat('LL'));
        $phpWord->setValue('nama_pegawai', Str::upper('AMDAN'));
        $phpWord->setValue('nip_pegawai', '');


        // Saving the document as OOXML file...
        $phpWord->saveAs($penduduk->nama . '.docx');
    }
}