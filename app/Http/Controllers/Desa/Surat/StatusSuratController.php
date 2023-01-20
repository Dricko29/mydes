<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;

class StatusSuratController extends Controller
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
    public function __invoke(Request $request, Surat $surat)
    {
        if ($surat->status == 2) {
            $surat->forceFill([
                'status' => 1,
            ])->save();
        } else {
            $surat->forceFill([
                'status' => 2,
            ])->save();
        }
        return redirect()->route('site.surat.index')->with('success', __('Data Updated Successfully!'));
        
    }
}