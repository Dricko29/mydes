<?php

namespace App\Http\Controllers\Keluarga;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Keluarga;

class UpdateAnggotaKeluargaController extends Controller
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
    public function __invoke(Request $request, Keluarga $keluarga)
    {
        $penduduk = Penduduk::where('id', $request->penduduk_id)->firstOrFail();
        $penduduk->forceFill([
            'keluarga_id' => $keluarga->id
        ])->save();

        return redirect('site/keluarga/'.$keluarga->id)->with('success', __('Data Changed Successfully!'));
    }
}