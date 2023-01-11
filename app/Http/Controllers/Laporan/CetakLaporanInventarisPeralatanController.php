<?php

namespace App\Http\Controllers\Laporan;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\InventarisPeralatan;
use App\Http\Controllers\Controller;

class CetakLaporanInventarisPeralatanController extends Controller
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
        $inventarisPeralatan = InventarisPeralatan::where('tahun', $request->tahun)->get();
        return view('desa.inventaris.peralatan.laporan', compact('inventarisPeralatan', 'ttd'));
    }
}