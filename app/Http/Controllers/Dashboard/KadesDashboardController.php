<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Services\BlogDataService;
use App\Http\Controllers\Controller;
use App\Services\PendudukDataService;

class KadesDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PendudukDataService $pendudukDataService)
    {
        $pageConfigs = ['pageHeader' => false];
        $jmlPendudukLaki = $pendudukDataService->getDataPendudukLaki();
        $jmlPendudukPerempuan = $pendudukDataService->getDataPendudukPerempuan();
        $jmlPenduduk = $pendudukDataService->getDataJumlahPenduduk();
        $jmlKeluarga = $pendudukDataService->getDataJumlahKeluarga();
        $dataAgamas = $pendudukDataService->getDataAgamas($jmlPenduduk);
        $pendidikan = $pendudukDataService->getDataPendidikan();
        $pekerjaan = $pendudukDataService->getDataPekerjaan();
        $dataKawins = $pendudukDataService->getDataKawins($jmlPenduduk);

        return view('dashboard.kades.dashboard', compact(
            'pageConfigs',
            'jmlPenduduk',
            'jmlPendudukLaki',
            'jmlPendudukPerempuan',
            'jmlKeluarga',
            'dataAgamas',
            'dataKawins',
            'pendidikan',
            'pekerjaan',
        ));
    }
}