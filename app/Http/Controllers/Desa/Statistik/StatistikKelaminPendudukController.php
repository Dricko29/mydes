<?php

namespace App\Http\Controllers\Desa\Statistik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttrKelamin;
use App\Services\PendudukDataService;

class StatistikKelaminPendudukController extends Controller
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
        $kelamin = AttrKelamin::withCount([
            'penduduk',
            'penduduk as laki' => function($l){
                $l->where('attr_kelamin_id',1);
            },
            'penduduk as perempuan' => function($p){
            $p->where('attr_kelamin_id', 2);
            }
        ])->get();
        return view('desa.statistik.kelamin', compact('kelamin','pendudukTotal'));
    }
}