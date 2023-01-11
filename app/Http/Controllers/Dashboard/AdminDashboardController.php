<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\AttrAgama;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pageConfigs = ['pageHeader' => false];
        $jmlPendudukLaki = Penduduk::count('attr_kelamin_id',1);
        $jmlPendudukPerempuan = Penduduk::count('attr_kelamin_id',2);
        $jmlPenduduk = Penduduk::count();
        $jmlKeluarga = Keluarga::count();

        // chart donut
        $agama = AttrAgama::withCount('penduduk')->get();

        $series = $agama->map(function($q) use ($jmlPenduduk){
            return (int) number_format((($q->penduduk_count / $jmlPenduduk) * 100));
        });
        $label = $agama->pluck('nama');
        $labelHead = $agama->where('penduduk_count', $agama->max('penduduk_count'))->pluck('nama');
        $seriesQuery =  $agama->where('penduduk_count', $agama->max('penduduk_count'))->first();
        $seriesHead = number_format((($seriesQuery->penduduk_count / $jmlPenduduk) * 100));
        $head= [
            'nama' => $agama->where('penduduk_count', $agama->max('penduduk_count'))->first(),
            'jml' => $seriesQuery->penduduk_count
        ];
        return view('dashboard.admin.dashboard', compact(
            'pageConfigs',
            'jmlPenduduk',
            'jmlPendudukLaki',
            'jmlPendudukPerempuan',
            'jmlKeluarga',
            'series',
            'label',
            'seriesHead',
            'labelHead',
            'head'
        ));
    }
}