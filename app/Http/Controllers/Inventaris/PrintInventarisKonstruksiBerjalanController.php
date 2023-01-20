<?php

namespace App\Http\Controllers\Inventaris;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisKonstruksiBerjalan;

class PrintInventarisKonstruksiBerjalanController extends Controller
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
    public function __invoke(Request $request, InventarisKonstruksiBerjalan $inventarisKonstruksiBerjalan)
    {
        return view('desa.inventaris.konstruksiBerjalan.print', compact('inventarisKonstruksiBerjalan'));
    }
}