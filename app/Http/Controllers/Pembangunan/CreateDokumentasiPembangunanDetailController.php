<?php

namespace App\Http\Controllers\Pembangunan;

use App\Http\Controllers\Controller;
use App\Models\Pembangunan;
use Illuminate\Http\Request;

class CreateDokumentasiPembangunanDetailController extends Controller
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
        return view('desa.pembangunan.create-dokumentasi', compact('pembangunan'));
    }
}