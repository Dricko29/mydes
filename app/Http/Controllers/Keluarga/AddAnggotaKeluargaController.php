<?php

namespace App\Http\Controllers\Keluarga;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

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