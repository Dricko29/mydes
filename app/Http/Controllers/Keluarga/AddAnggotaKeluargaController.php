<?php

namespace App\Http\Controllers\Keluarga;

use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AddAnggotaKeluargaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Keluarga $keluarga)
    {
        abort_if(!Gate::allows('create keluarga'), 403);
        $penduduks = Penduduk::where('keluarga_id', null)->get();
        if ($penduduks->count()) {
            $cek = false;
        } else {
            $cek = true;
        }
        return view('desa.keluarga.form_tambah_anggota_keluarga', compact([
            'keluarga',
            'penduduks',
            'cek'
        ]));
    }
}