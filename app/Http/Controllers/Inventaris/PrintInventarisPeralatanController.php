<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use App\Models\InventarisPeralatan;
use Illuminate\Http\Request;

class PrintInventarisPeralatanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, InventarisPeralatan $inventarisPeralatan)
    {
        return view('desa.inventaris.peralatan.print', compact('inventarisPeralatan'));
    }
}