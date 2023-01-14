<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;

class AssignPersyaratanSuratController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Surat $surat)
    {
        $persyaratan = collect($request->persyaratan);
        $surat->syaratSurats()->sync($persyaratan);
        return redirect()->route('site.surat.index')->with('success', __('Data Updated Successfully!'));
    }
}