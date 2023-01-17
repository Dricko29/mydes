<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $jmlPendudukLaki = Penduduk::count('attr_kelamin_id', 1);
        $jmlPendudukPerempuan = Penduduk::count('attr_kelamin_id', 2);
        $jmlPenduduk = Penduduk::count();
        $jmlKeluarga = Keluarga::count();
        $pegawais = Pegawai::with('jabatan')->get();
        return view('home', compact(
            'jmlPendudukLaki',
            'jmlPendudukPerempuan',
            'jmlPenduduk',
            'jmlKeluarga',
            'pegawais'
        ));
    }
}