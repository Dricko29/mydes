<?php

namespace App\Http\Controllers\Desa\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\AttrStatusDasar;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class EditStatusDasarPendudukController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Penduduk $penduduk)
    {
        $status = AttrStatusDasar::all();
        $title = 'biodata';
        return view('desa.penduduk.edit-status', compact('penduduk', 'status', 'title'));
    }
}