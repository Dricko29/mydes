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
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('read surat'), 403);
        $surat = Surat::find($id);
        $pegawais = Pegawai::all();
        $penduduks = Penduduk::all();
        return view('desa.surat.cetak.surat-biodata', compact('penduduks', 'pegawais', 'surat'));
    }
}