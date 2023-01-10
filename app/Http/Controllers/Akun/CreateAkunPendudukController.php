<?php

namespace App\Http\Controllers\Akun;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateAkunPendudukController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Penduduk $penduduk)
    {
        return view('desa.penduduk.akun.create-akun', compact('penduduk'));
    }
}