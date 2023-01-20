<?php

namespace App\Http\Controllers\Desa\Surat;

use Carbon\Carbon;
use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\Penduduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratBiodataController extends Controller
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
    public function __invoke(Request $request, $id)
    {
        $surat = Surat::find($id);
        $pegawais = Pegawai::all();
        $penduduks = Penduduk::all();
        return view('desa.surat.cetak.surat-biodata', compact('penduduks', 'pegawais', 'surat'));
    }
}