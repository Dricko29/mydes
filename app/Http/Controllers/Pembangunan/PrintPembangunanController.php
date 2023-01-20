<?php

namespace App\Http\Controllers\Pembangunan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DokumentasiPembangunan;
use App\Models\Pembangunan;

class PrintPembangunanController extends Controller
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
    public function __invoke(Request $request, Pembangunan $pembangunan)
    {
        $pageConfigs = ['pageHeader' => false];

        $progres = DokumentasiPembangunan::where('pembangunan_id', $pembangunan->id)->max('progres');
        return view('desa.pembangunan.print', ['pageConfigs' => $pageConfigs, 'pembangunan' => $pembangunan, 'progres' => $progres]);
    }
}