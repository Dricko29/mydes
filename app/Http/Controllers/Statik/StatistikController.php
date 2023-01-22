<?php

namespace App\Http\Controllers\Statik;

use Illuminate\Http\Request;
use App\Services\BlogDataService;
use App\Http\Controllers\Controller;
use App\Services\PendudukDataService;

class StatistikController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PendudukDataService $pendudukDataService)
    {
        $jmlPendudukLaki = $pendudukDataService->getDataPendudukLaki();
        $jmlPendudukPerempuan = $pendudukDataService->getDataPendudukPerempuan();
        $jmlPenduduk = $pendudukDataService->getDataJumlahPenduduk();
        $jmlKeluarga = $pendudukDataService->getDataJumlahKeluarga();
        $dataAgamas = $pendudukDataService->getDataAgamas($jmlPenduduk);
        $pendidikan = $pendudukDataService->getDataPendidikan();
        $pekerjaan = $pendudukDataService->getDataPekerjaan();
        $dataKawins = $pendudukDataService->getDataKawins($jmlPenduduk);
        return view('pages.statistik.statistik', compact([
            'jmlPenduduk',
            'jmlPendudukLaki',
            'jmlPendudukPerempuan',
            'jmlKeluarga',
            'dataAgamas',
            'dataKawins',
            'pendidikan',
            'pekerjaan',
        ]));
    }
}