<?php

namespace App\Http\Controllers\Desa\Statistik;

use App\Models\Penduduk;
use App\Models\AttrAgama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttrGolonganDarah;
use App\Models\AttrPendidikanKeluarga;
use App\Services\PendudukDataService;

class StatistikDarahPendudukController extends Controller
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
        $darah = AttrGolonganDarah::withCount([
            'penduduk',
            'penduduk as laki' => function($l){
                $l->where('attr_kelamin_id',1);
            },
            'penduduk as perempuan' => function($p){
            $p->where('attr_kelamin_id', 2);
            }
        ])->get();
        return view('desa.statistik.darah', compact('darah','pendudukTotal'));
    }
}