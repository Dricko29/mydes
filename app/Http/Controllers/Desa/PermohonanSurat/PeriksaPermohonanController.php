<?php

namespace App\Http\Controllers\Desa\PermohonanSurat;

use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Penduduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PermohonanSurat;
use App\Http\Controllers\Controller;

class PeriksaPermohonanController extends Controller
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
    public function __invoke(Request $request,$permohonan, $surat, $penduduk)
    {
        $permohonan = PermohonanSurat::find($permohonan);
        $dokumen = json_decode($permohonan->dokumen);
        $surat = Surat::find($surat);
        $pegawais = Pegawai::all();
        $penduduk = Penduduk::find($penduduk);
        return view('desa.permohonan-surat.periksa-surat', compact('penduduk', 'pegawais', 'surat', 'permohonan', 'dokumen'));
    }
}