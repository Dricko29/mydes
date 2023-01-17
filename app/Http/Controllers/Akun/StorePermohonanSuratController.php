<?php

namespace App\Http\Controllers\Akun;

use App\Models\Surat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PermohonanSurat;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermohonanSuratRequest;
use Illuminate\Database\Eloquent\Collection;

class StorePermohonanSuratController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StorePermohonanSuratRequest $request)
    {

        if ($request->hasfile('dokumen')) {
            $files = array();
            foreach ($request->file('dokumen') as $file) {
                if ($file->isValid()) {
                    $dokumen = $file->store('surat/permohonan/'.$request->penduduk_id.'/');
                    $files []  = $dokumen;
                }
            }
            PermohonanSurat::create([
                'surat_id' => $request->surat_id,
                'penduduk_id' => $request->penduduk_id,
                'ket' => $request->ket,
                'tlp_aktif' => $request->tlp_aktif,
                'dokumen' => json_encode($files)
            ]);
        } else {

            PermohonanSurat::create([
                'surat_id' => $request->surat_id,
                'penduduk_id' => $request->penduduk_id,
                'ket' => $request->ket,
                'tlp_aktif' => $request->tlp_aktif,
            ]);
        }

        return redirect()->route('user.surat.user')->with('success', __('Permohonan Terkirim!'));
    }
}