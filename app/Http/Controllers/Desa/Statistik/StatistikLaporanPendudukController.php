<?php

namespace App\Http\Controllers\Desa\Statistik;

use Illuminate\Http\Request;
use App\Models\AttrStatusDasar;
use App\Models\LogPendudukMati;
use App\Models\LogPendudukLahir;
use App\Models\LogPendudukMasuk;
use App\Models\LogPendudukPindah;
use App\Http\Controllers\Controller;
use App\Models\AttrKelamin;

class StatistikLaporanPendudukController extends Controller
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
        $tahun = $request->tahun;
        $laporan = collect();
        // pindah
        $pendudukPindah = collect();
        $totalPendudukPindah = LogPendudukPindah::with('penduduk')->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $totalPendudukPindahLaki = LogPendudukPindah::whereHas('penduduk', function($q){
            $q->where('attr_kelamin_id',1);
        })->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $totalPendudukPindahPerempuan = LogPendudukPindah::whereHas('penduduk', function($q){
            $q->where('attr_kelamin_id',2);
        })->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $pendudukPindah =  $pendudukPindah->push(['total'=>$totalPendudukPindah,'laki'=>$totalPendudukPindahLaki,'perempuan'=>$totalPendudukPindahPerempuan]);
        // lahir
        $pendudukLahir = collect();
        $totalPendudukLahir = LogPendudukLahir::with('penduduk')->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $totalPendudukLahirLaki = LogPendudukLahir::whereHas('penduduk', function($q){
            $q->where('attr_kelamin_id',1);
        })->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $totalPendudukLahirPerempuan = LogPendudukLahir::whereHas('penduduk', function($q){
            $q->where('attr_kelamin_id',2);
        })->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $pendudukLahir =  $pendudukLahir->push(['total'=>$totalPendudukLahir,'laki'=>$totalPendudukLahirLaki,'perempuan'=>$totalPendudukLahirPerempuan]);
        // masuk
        $pendudukMasuk = collect();
        $totalPendudukMasuk = LogPendudukMasuk::with('penduduk')->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $totalPendudukMasukLaki = LogPendudukMasuk::whereHas('penduduk', function($q){
            $q->where('attr_kelamin_id',1);
        })->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $totalPendudukMasukPerempuan = LogPendudukMasuk::whereHas('penduduk', function($q){
            $q->where('attr_kelamin_id',2);
        })->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $pendudukMasuk =  $pendudukMasuk->push(['total'=>$totalPendudukMasuk,'laki'=>$totalPendudukMasukLaki,'perempuan'=>$totalPendudukMasukPerempuan]);
        // mati
        $pendudukMati = collect();
        $totalPendudukMati = LogPendudukMati::with('penduduk')->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $totalPendudukMatiLaki = LogPendudukMati::whereHas('penduduk', function($q){
            $q->where('attr_kelamin_id',1);
        })->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $totalPendudukMatiPerempuan = LogPendudukMati::whereHas('penduduk', function($q){
            $q->where('attr_kelamin_id',2);
        })->when($tahun, function($q) use ($tahun){
            $q->whereYear('tanggal_lapor',$tahun);
        })->count();
        $pendudukMati =  $pendudukMati->push(['total'=>$totalPendudukMati,'laki'=>$totalPendudukMatiLaki,'perempuan'=>$totalPendudukMatiPerempuan]);

        return view('desa.statistik.laporan', compact(
            'pendudukLahir',
            'pendudukMati',
            'pendudukPindah',
            'pendudukMasuk',
        ));
    }
}