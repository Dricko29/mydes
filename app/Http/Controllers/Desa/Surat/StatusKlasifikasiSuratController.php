<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Http\Controllers\Controller;
use App\Models\KlasifikasiSurat;
use Illuminate\Http\Request;

class StatusKlasifikasiSuratController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, KlasifikasiSurat $klasifikasiSurat)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('read surat'), 403);
        if ($klasifikasiSurat->status == 2) {
            $klasifikasiSurat->forceFill([
                'status' => 1,
            ])->save();
        } else {
            $klasifikasiSurat->forceFill([
                'status' => 2,
            ])->save();
        }
        return redirect()->route('site.klasifikasiSurat.index')->with('success', __('Data Updated Successfully!'));
        
    }
}