<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use App\Models\InventarisAssetTetap;
use App\Models\InventarisTanah;
use Illuminate\Http\Request;

class PrintInventarisAssetTetapController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, InventarisAssetTetap $inventarisAssetTetap)
    {
        return view('desa.inventaris.assetTetap.print', compact('inventarisAssetTetap'));
    }
}