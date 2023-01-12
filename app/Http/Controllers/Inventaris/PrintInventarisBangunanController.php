<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use App\Models\InventarisBangunan;
use App\Models\InventarisTanah;
use Illuminate\Http\Request;

class PrintInventarisBangunanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, InventarisBangunan $inventarisBangunan)
    {
        return view('desa.inventaris.bangunan.print', compact('inventarisBangunan'));
    }
}