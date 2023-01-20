<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use App\Models\InventarisTanah;
use Illuminate\Http\Request;

class PrintInventarisTanahController extends Controller
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
    public function __invoke(Request $request, InventarisTanah $inventarisTanah)
    {
        return view('desa.inventaris.tanah.print', compact('inventarisTanah'));
    }
}