<?php

namespace App\Http\Controllers\Laporan;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\InventarisTanah;
use App\Models\InventarisPeralatan;
use App\Http\Controllers\Controller;
use App\Models\InventarisBangunan;

class CetakLaporanInventarisBangunanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $ttd = Pegawai::find($request->pegawai_id);
        $inventarisBangunan = InventarisBangunan::where('tahun', $request->tahun)->get();
        return view('desa.inventaris.bangunan.laporan', compact('inventarisBangunan', 'ttd'));
    }
}