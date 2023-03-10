<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class FormCetakLaporanInventarisController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $jenis)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('read inventaris'), 403);
        $pegawais = Pegawai::where('ttd', true)->get();
        return view('desa.inventaris.form-cetak', compact('pegawais', 'jenis'));
    }
}