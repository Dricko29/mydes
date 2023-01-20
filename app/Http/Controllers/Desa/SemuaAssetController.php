<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\InvAsal;
use Illuminate\Http\Request;

class SemuaAssetController extends Controller
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
        $assets = InvAsal::withCount(
            'inventarisKonstruksiBerjalans', 
            'inventarisTanahs', 
            'inventarisAssetTetaps', 
            'inventarisBangunans', 
            'inventarisPeralatans'
            )->get();
        // return $assets;
        return view('desa.inventaris.laporan-semua-assets', compact('assets'));
    }
}