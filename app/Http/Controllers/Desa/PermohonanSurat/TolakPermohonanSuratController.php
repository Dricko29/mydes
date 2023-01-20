<?php

namespace App\Http\Controllers\Desa\PermohonanSurat;

use App\Http\Controllers\Controller;
use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

class TolakPermohonanSuratController extends Controller
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
    public function __invoke(Request $request, PermohonanSurat $permohonanSurat)
    {
        $permohonanSurat->update([
            'status' => 0,
            'pesan' => $request->pesan
        ]);
        return redirect()->route('site.permohonanSurat.index')->with('success', __('Data Updated Successfully!'));
    }
}