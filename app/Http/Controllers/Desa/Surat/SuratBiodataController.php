<?php

namespace App\Http\Controllers\Desa\Surat;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratBiodataController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $penduduks = Penduduk::all();
        return view('desa.surat.cetak.surat-biodata', compact('penduduks'));
    }
}