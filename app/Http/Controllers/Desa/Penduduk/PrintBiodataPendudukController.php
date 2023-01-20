<?php

namespace App\Http\Controllers\Desa\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PrintBiodataPendudukController extends Controller
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
    public function __invoke(Request $request, Penduduk $penduduk)
    {
        $pageConfigs = ['pageHeader' => false];
        return view('desa.penduduk.print', compact(
            'pageConfigs',
            'penduduk'
        ));
    }
}