<?php

namespace App\Http\Controllers\Desa\PermohonanSurat;

use App\Http\Controllers\Controller;
use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

class StatusPermohonanSuratController extends Controller
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
    public function __invoke(Request $request, $permohonan, $status)
    {
        $permohonan = PermohonanSurat::find($permohonan);
        $permohonan->update([
            'status' => $status
        ]);
        return redirect()->route('site.permohonanSurat.index')->with('success', __('Data Updated Successfully!'));
    }
}