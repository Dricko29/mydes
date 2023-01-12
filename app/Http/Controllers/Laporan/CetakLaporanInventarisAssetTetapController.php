<?php

namespace App\Http\Controllers\Laporan;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisAssetTetap;

class CetakLaporanInventarisAssetTetapController extends Controller
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
        $inventarisAssetTetap = InventarisAssetTetap::where('tahun', $request->tahun)->get();
        return view('desa.inventaris.assetTetap.laporan', compact('inventarisAssetTetap', 'ttd'));
    }
}