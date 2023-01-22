<?php

namespace App\Http\Controllers\Desa\Statistik;

use App\Models\Pegawai;
use App\Models\AttrAgama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PendudukDataService;
use App\Models\AttrPendidikanKeluarga;

class CetakStatistikPendudukController extends Controller
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
    public function __invoke(Request $request, PendudukDataService $pendudukDataService)
    {
        $pendudukTotal = $pendudukDataService->getDataJumlahPenduduk();
        $no_laporan = $request->no_laporan;
        $ttd = Pegawai::find($request->pegawai_id);
        if($request->jenis == 'agama'){
            $agama = AttrAgama::withCount([
                'penduduk',
                'penduduk as laki' => function ($l) {
                    $l->where('attr_kelamin_id', 1);
                },
                'penduduk as perempuan' => function ($p) {
                    $p->where('attr_kelamin_id', 2);
                }
            ])->get();
            return view('desa.statistik.cetak-agama', compact(
                'pendudukTotal',
                'agama',
                'no_laporan',
                'ttd'
            ));
        }elseif ($request->jenis == 'pendidikan') {
            $pendidikan = AttrPendidikanKeluarga::withCount([
                'penduduk',
                'penduduk as laki' => function ($l) {
                    $l->where('attr_kelamin_id', 1);
                },
                'penduduk as perempuan' => function ($p) {
                    $p->where('attr_kelamin_id', 2);
                }
            ])->get();
            return view('desa.statistik.cetak-pendidikan', compact(
                'pendudukTotal',
                'pendidikan',
                'no_laporan',
                'ttd'
            ));
        }
    }
}