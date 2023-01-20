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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PermohonanSurat;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class CetakSuratPengantarController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|petugas|kades']);
    }
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
                'keperluan' => ['required', 'string'],
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
            $phpWord = new TemplateProcessor(storage_path('app/public/template-surat/surat-pengantar.docx'));

            /* Note: any element you append to a document must reside inside of a Section. */

            // head
            $phpWord->setValue('kab', Str::upper(settings()->group('desa')->get('nama_kabupaten')));
            $phpWord->setValue('kec', Str::upper(settings()->group('desa')->get('nama_kecamatan')));
            $phpWord->setValue('des', Str::upper(settings()->group('desa')->get('nama_desa')));
            $phpWord->setValue('alamat_kantor', Str::upper(settings()->group('desa')->get('alamat_kantor')));
            $phpWord->setImageValue('logo', array('path' => asset(settings()->group('umum')->get('app_logo')), 'height' => 120, 'ratio' => false));
            $phpWord->setValue('desa', Str::ucfirst(settings()->group('desa')->get('nama_desa')));
            $phpWord->setValue('kecamatan', Str::ucfirst(settings()->group('desa')->get('nama_kecamatan')));
            $phpWord->setValue('kabupaten', Str::ucfirst(settings()->group('desa')->get('nama_kabupaten')));

            // keluarga
            $phpWord->setValue('nomor_surat', Str::upper($nomor_surat->nomor));
            $phpWord->setValue('judul_surat', Str::upper('surat pengantar'));
            
            $phpWord->setValue('nama_penduduk', Str::upper($penduduk->nama));
            $phpWord->setValue('tempat_lahir', Str::ucfirst($penduduk->tempat_lahir));
            $phpWord->setValue('tanggal_lahir', Carbon::parse($penduduk->tanggal_lahir)->format('d-m-Y'));
            $phpWord->setValue('umur', Carbon::parse($penduduk->tanggal_lahir)->age);
            $phpWord->setValue('warganegara', Str::ucfirst($penduduk->attrWarganegara->nama));
            $phpWord->setValue('agama', Str::ucfirst($penduduk->attrAgama->nama));
            $phpWord->setValue('kelamin', Str::ucfirst($penduduk->attrKelamin->nama));
            $phpWord->setValue('pekerjaan', Str::ucfirst($penduduk->attrPekerjaan->nama));
            $phpWord->setValue('rt',$penduduk->rukunTetangga->nama_rt);
            $phpWord->setValue('rw',$penduduk->rukunWarga->nama_rw);
            $phpWord->setValue('dusun',$penduduk->dusun->nama_dusun);
            $phpWord->setValue('nik', $penduduk->nik);
            $phpWord->setValue('no_keluarga', $penduduk->keluarga->no_keluarga);
            $phpWord->setValue('keperluan', Str::ucfirst($request->keperluan));
            $phpWord->setValue('tanggal_awal', Carbon::parse($request->tanggal_awal)->format('d-m-Y'));
            $phpWord->setValue('tanggal_akhir', Carbon::parse($request->tanggal_akhir)->format('d-m-Y'));
            $phpWord->setValue('golongan_darah', $penduduk->attrGolonganDarah->nama);
            
            $phpWord->setValue('tanggal', Carbon::now()->isoFormat('LL'));
            if($pegawai->id != 1){
                $phpWord->setValue('an', 'an');
            }else{
                $phpWord->setValue('an', '');
            }
            $phpWord->setValue('ttd', Str::upper($pegawai->jabatan->nama));
            $phpWord->setValue('nama_pegawai', Str::upper($pegawai->nama));
            $phpWord->setValue('nip_pegawai', $pegawai->nip);

            // Saving the document as OOXML file...
            // save database
            $folder = 'arsip/surat/pengantar/';
            $name = 'pengantar_'.$penduduk->nama . '.docx';
            $full = $folder . $name;

            // save kestrorage
            $path = 'app/public/arsip/surat/pengantar/';

            $logSurat->forceFill([
                'file' => $full
            ])->save();

            $directories = Storage::directories('app/public/arsip/surat/pengantar/');
            if ($directories) {
                return true;
            } else {
                Storage::makeDirectory('arsip/surat/pengantar/');
            }
            $phpWord->saveAs(storage_path($path . $name));

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
        return response()->download(storage_path($path . $name));
    }
}