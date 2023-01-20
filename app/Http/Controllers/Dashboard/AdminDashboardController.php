<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\AttrAgama;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttrPekerjaan;
use App\Models\AttrPendidikanKeluarga;
use App\Models\AttrStatusKawin;
use App\Services\BlogDataService;
use App\Services\PendudukDataService;

class AdminDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PendudukDataService $pendudukDataService, BlogDataService $blogDataService)
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

        // blog
        $blogJml = $blogDataService->getDataJmlPost();
        $blogPublished = $blogDataService->getDataJmlPostPublished();
        $blogPending = $blogDataService->getDataJmlPostPending();
        $blogDraft = $blogDataService->getDataJmlPostDraft();
        
        return view('dashboard.admin.dashboard', compact(
            'pageConfigs',
            'jmlPenduduk',
            'jmlPendudukLaki',
            'jmlPendudukPerempuan',
            'jmlKeluarga',
            'dataAgamas',
            'dataKawins',
            'pendidikan',
            'pekerjaan',
            'blogJml',
            'blogPublished',
            'blogPending',
            'blogDraft'
        ));
    }
}