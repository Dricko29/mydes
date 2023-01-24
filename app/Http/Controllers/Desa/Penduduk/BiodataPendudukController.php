<?php

namespace App\Http\Controllers\Desa\Penduduk;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class BiodataPendudukController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Penduduk $penduduk)
    {
        abort_if(!Gate::allows('read penduduk'), 403);
        $pageConfigs = ['pageHeader' => false];
        return view('desa.penduduk.biodata', compact(
            'pageConfigs',
            'penduduk'
        ));
    }
}