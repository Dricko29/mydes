<?php

namespace App\Http\Controllers\Keluarga;

use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

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
        abort_if(!Gate::allows('update keluarga'), 403);
        $penduduk = Penduduk::where('id', $request->penduduk_id)->firstOrFail();
        $penduduk->forceFill([
            'keluarga_id' => $keluarga->id
        ])->save();

        return redirect('site/keluarga/'.$keluarga->id)->with('success', __('Data Changed Successfully!'));
    }
}