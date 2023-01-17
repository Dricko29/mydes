<?php

namespace App\Http\Controllers\Desa\Surat;

use Carbon\Carbon;
use App\Models\Pegawai;
use App\Models\Keluarga;
use App\Models\LogSurat;
use App\Models\Penduduk;
use App\Models\NomorSurat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PermohonanSurat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
        $pegawai = Pegawai::find($request->pegawai_id);
        $penduduk = Penduduk::find($request->penduduk_id);
        $keluarga = Keluarga::where('id', $penduduk->keluarga_id)->firstOrFail();
        $kepala = Penduduk::where('keluarga_id', $keluarga->id)->where('attr_hubungan_id', 1)->first();

        try {
            DB::beginTransaction();

            $request->validate([
                'nomor' => ['unique:nomor_surats'],
                'penduduk_id' => ['required'],
                'pegawai_id' => ['required']
            ]);
            $logSurat = LogSurat::create([
                'penduduk_id' => $penduduk->id,
                'surat_id' => $request->surat,
                'pegawai_id' => $pegawai->id,
            ]);

            $nomor_surat = NomorSurat::create([
                'log_surat_id' => $logSurat->id,
                'surat_id' => $request->surat,
                'nomor' => $request->nomor
            ]);

            // Creating the new document...
            $phpWord = new TemplateProcessor(storage_path('app/public/template-surat/surat-biodata.docx'));

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
            $phpWord->setValue('alamat', Str::ucfirst($penduduk->alamat));
            $phpWord->setValue('desa', Str::ucfirst(settings()->group('desa')->get('nama_desa')));
            $phpWord->setValue('kecamatan', Str::ucfirst(settings()->group('desa')->get('nama_kecamatan')));
            $phpWord->setValue('kabupaten', Str::ucfirst(settings()->group('desa')->get('nama_kabupaten')));

            // individu
            $phpWord->setValue('nama_lengkap', Str::ucfirst($penduduk->nama));
            $phpWord->setValue('nik', $penduduk->nik);
            $phpWord->setValue('alamat_sebelumnya', Str::ucfirst($penduduk->alamat));
            $phpWord->setValue('paspor', $penduduk->paspor);
            $phpWord->setValue('tanggal_paspor', Carbon::parse($penduduk->tanggal_paspor)->format('d-m-Y'));
            $phpWord->setValue('kelamin', Str::ucfirst($penduduk->attrKelamin->nama));
            $phpWord->setValue('tempat_lahir', Str::ucfirst($penduduk->tempat_lahir));
            $phpWord->setValue('tanggal_lahir', Carbon::parse($penduduk->tanggal_lahir)->format('d-m-Y'));
            $phpWord->setValue('no_akta_lahir', $penduduk->no_akta_kelahiran);
            $phpWord->setValue('golongan_darah', $penduduk->attrGolonganDarah->nama);
            $phpWord->setValue('agama', Str::ucfirst($penduduk->attrAgama->nama));
            $phpWord->setValue('status', Str::ucfirst($penduduk->attrStatus->nama));
            $phpWord->setValue('no_akta_pernikahan', $penduduk->no_akta_pernikahan);
            $phpWord->setValue('tanggal_pernikahan', Carbon::parse($penduduk->tanggal_pernikahan)->format('d-m-Y'));
            $phpWord->setValue('no_akta_perceraian', $penduduk->no_akta_perceraian);
            $phpWord->setValue('tanggal_perceraian', Carbon::parse($penduduk->tanggal_perceraian)->format('d-m-Y'));
            $phpWord->setValue('hubungan', Str::ucfirst($penduduk->attrHubungan->nama));
            $phpWord->setValue('cacat', Str::ucfirst('-'));
            $phpWord->setValue('pendidikan_kk', Str::ucfirst($penduduk->attrPendidikanKeluarga->nama));
            $phpWord->setValue('pekerjaan', Str::ucfirst($penduduk->attrPekerjaan->nama));
            $phpWord->setValue('nama_ibu', Str::ucfirst($penduduk->nama_ibu));
            $phpWord->setValue('nik_ibu', $penduduk->nik_ibu);
            $phpWord->setValue('nama_ayah', Str::ucfirst($penduduk->nama_ayah));
            $phpWord->setValue('nik_ayah', $penduduk->nik_ayah);
            $phpWord->setValue('tanggal', Carbon::now()->isoFormat('LL'));
            $phpWord->setValue('ttd', Str::upper($pegawai->jabatan->nama));
            if ($pegawai->id != 1) {
                $phpWord->setValue('an', 'an');
            } else {
                $phpWord->setValue('an', '');
            }
            $phpWord->setValue('nama_pegawai', Str::upper($pegawai->nama));
            $phpWord->setValue('nip_pegawai', $pegawai->nip);

            // Saving the document as OOXML file...
            // save database
            $folder = 'arsip/surat/biodata/';
            $name = 'biodata_'.$penduduk->nama.'.docx';
            $full = $folder.$name;

            // save kestrorage
            $path = 'app/public/arsip/surat/biodata/';

            $logSurat->forceFill([
                'file' => $full
            ])->save();
            $directories = Storage::directories('app/public/arsip/surat/biodata/');
            if($directories){
                return true;
            }else{
                Storage::makeDirectory('arsip/surat/biodata/');
            }
            $phpWord->saveAs(storage_path($path.$name));
            if ($request->permohonan) {
                $permohonan = PermohonanSurat::find($request->permohonan)->forceFill([
                    'status' => 2
                ])->save();
            }

            DB::commit();
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
        return response()->download(storage_path($path.$name));

    }
}