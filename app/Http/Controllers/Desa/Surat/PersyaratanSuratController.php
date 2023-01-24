<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\SyaratSurat;
use Illuminate\Http\Request;

class PersyaratanSuratController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Surat $surat)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('read surat'), 403);
        $surat_syarat= $surat->syaratSurats->pluck('id')->toArray();
        $persyaratan = SyaratSurat::all();
        return view('desa.surat.pengaturan.persyaratan', compact('surat', 'persyaratan', 'surat_syarat'));
    }
}