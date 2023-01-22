<?php

namespace App\Http\Controllers\Desa\Statistik;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormCetakStatistikPendudukController extends Controller
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
    public function __invoke(Request $request, $jenis)
    {
        $pegawais = Pegawai::all();
        return view('desa.statistik.form-cetak', compact('pegawais', 'jenis'));
    }
}