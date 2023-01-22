<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use App\Services\PendudukDataService;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,PendudukDataService $pendudukDataService)
    {
        $misi = json_decode(settings()->group('desa')->get('misi'));
        $firstBlog = Blog::latest()->first();
        // blog
        $blogs = Blog::with(['category', 'tags', 'creator', 'comments' => function ($q) {
            $q->where('status', 2);
        }])->cari($request->cari_blog)->published()->latest()->paginate(6);

        $pegawais = Pegawai::with('jabatan')->get();
        $jmlPendudukLaki = $pendudukDataService->getDataPendudukLaki();
        $jmlPendudukPerempuan = $pendudukDataService->getDataPendudukPerempuan();
        $jmlPenduduk = $pendudukDataService->getDataJumlahPenduduk();
        $jmlKeluarga = $pendudukDataService->getDataJumlahKeluarga();
        $dataAgamas = $pendudukDataService->getDataAgamas($jmlPenduduk);
        $pendidikan = $pendudukDataService->getDataPendidikan();
        $pekerjaan = $pendudukDataService->getDataPekerjaan();
        $dataKawins = $pendudukDataService->getDataKawins($jmlPenduduk);
        return view('home', compact(
            'jmlPenduduk',
            'jmlPendudukLaki',
            'jmlPendudukPerempuan',
            'jmlKeluarga',
            'dataAgamas',
            'dataKawins',
            'pendidikan',
            'pekerjaan',
            'pegawais',
            'blogs',
            'firstBlog',
            'misi'
        ));
    }
}