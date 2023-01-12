<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use App\Models\InventarisTanah;
use Illuminate\Http\Request;

class PrintInventarisTanahController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, InventarisTanah $inventarisTanah)
    {
        return view('desa.inventaris.tanah.print', compact('inventarisTanah'));
    }
}