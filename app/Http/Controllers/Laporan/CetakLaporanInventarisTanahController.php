<?php

namespace App\Http\Controllers\Laporan;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\InventarisTanah;
use App\Models\InventarisPeralatan;
use App\Http\Controllers\Controller;

class CetakLaporanInventarisTanahController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('read inventaris'), 403);
        $ttd = Pegawai::find($request->pegawai_id);
        if ($request->tahun == '') {
            $title = 'SEMUA TAHUN';
            $inventarisTanah = InventarisTanah::all();
        } else {
            $title = 'TAHUN ' . $request->tahun;
            $inventarisTanah = InventarisTanah::where('tahun', $request->tahun)->get();
        }
        return view('desa.inventaris.tanah.laporan', compact('inventarisTanah', 'ttd', 'title'));
    }
}