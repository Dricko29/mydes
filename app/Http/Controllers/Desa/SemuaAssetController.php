<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\InvAsal;
use Illuminate\Http\Request;

class SemuaAssetController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('read inventaris'), 403);
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