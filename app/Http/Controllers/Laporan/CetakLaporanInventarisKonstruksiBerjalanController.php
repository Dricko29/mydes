<?php

namespace App\Http\Controllers\Laporan;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisKonstruksiBerjalan;

class CetakLaporanInventarisKonstruksiBerjalanController extends Controller
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
        if ($request->tahun == '') {
            $title = 'SEMUA TAHUN';
            $inventarisKonstruksiBerjalan = InventarisKonstruksiBerjalan::all();
        } else {
            $title = 'TAHUN '.$request->tahun;
            $inventarisKonstruksiBerjalan = InventarisKonstruksiBerjalan::whereYear('tanggal_mulai', $request->tahun)->get();
        }
        return view('desa.inventaris.konstruksiBerjalan.laporan', compact('inventarisKonstruksiBerjalan', 'ttd', 'title'));
    }
}