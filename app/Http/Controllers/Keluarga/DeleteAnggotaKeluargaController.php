<?php

namespace App\Http\Controllers\Keluarga;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class DeleteAnggotaKeluargaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Keluarga $keluarga, Penduduk $penduduk)
    {
        $penduduk->forceFill([
            'keluarga_id' => null
        ])->save();

        return redirect()->back()->with('success', __('Data Changed Successfully!'));
    }
}