<?php

namespace App\Http\Controllers\Laporan;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\InventarisTanah;
use App\Models\InventarisPeralatan;
use App\Http\Controllers\Controller;

class CetakLaporanInventarisTanahController extends Controller
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
        $ttd = Pegawai::find($request->pegawai_id);
        $inventarisTanah = InventarisTanah::where('tahun', $request->tahun)->get();
        return view('desa.inventaris.tanah.laporan', compact('inventarisTanah', 'ttd'));
    }
}