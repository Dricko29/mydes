<?php

namespace App\Http\Controllers\Desa\Statistik;

use App\Models\Pegawai;
use App\Models\AttrAgama;
use App\Models\AttrStatus;
use App\Models\AttrKelamin;
use App\Models\AttrHubungan;
use Illuminate\Http\Request;
use App\Models\AttrStatusKawin;
use App\Models\AttrGolonganDarah;
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
        } elseif ($request->jenis == 'kawin') {
            $kawin = AttrStatusKawin::withCount([
                'penduduk',
                'penduduk as laki' => function ($l) {
                    $l->where('attr_kelamin_id', 1);
                },
                'penduduk as perempuan' => function ($p) {
                    $p->where('attr_kelamin_id', 2);
                }
            ])->get();
            return view('desa.statistik.cetak-kawin', compact(
                'pendudukTotal',
                'kawin',
                'no_laporan',
                'ttd'
            ));
        } elseif ($request->jenis == 'kelamin') {
            $kelamin = AttrKelamin::withCount([
                'penduduk',
                'penduduk as laki' => function ($l) {
                    $l->where('attr_kelamin_id', 1);
                },
                'penduduk as perempuan' => function ($p) {
                    $p->where('attr_kelamin_id', 2);
                }
            ])->get();
            return view('desa.statistik.cetak-kelamin', compact(
                'pendudukTotal',
                'kelamin',
                'no_laporan',
                'ttd'
            ));
        } elseif ($request->jenis == 'hubungan') {
            $hubungan = AttrHubungan::withCount([
                'penduduk',
                'penduduk as laki' => function ($l) {
                    $l->where('attr_kelamin_id', 1);
                },
                'penduduk as perempuan' => function ($p) {
                    $p->where('attr_kelamin_id', 2);
                }
            ])->get();
            return view('desa.statistik.cetak-hubungan', compact(
                'pendudukTotal',
                'hubungan',
                'no_laporan',
                'ttd'
            ));
        } elseif ($request->jenis == 'darah') {
            $darah = AttrGolonganDarah::withCount([
                'penduduk',
                'penduduk as laki' => function ($l) {
                    $l->where('attr_kelamin_id', 1);
                },
                'penduduk as perempuan' => function ($p) {
                    $p->where('attr_kelamin_id', 2);
                }
            ])->get();
            return view('desa.statistik.cetak-darah', compact(
                'pendudukTotal',
                'darah',
                'no_laporan',
                'ttd'
            ));
        } elseif ($request->jenis == 'status') {
            $status = AttrStatus::withCount([
                'penduduk',
                'penduduk as laki' => function ($l) {
                    $l->where('attr_kelamin_id', 1);
                },
                'penduduk as perempuan' => function ($p) {
                    $p->where('attr_kelamin_id', 2);
                }
            ])->get();
            return view('desa.statistik.cetak-status', compact(
                'pendudukTotal',
                'status',
                'no_laporan',
                'ttd'
            ));
        }
    }
}