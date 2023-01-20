<?php

namespace App\Http\Controllers\Pembangunan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDokumentasiPembangunanRequest;
use App\Models\DokumentasiPembangunan;
use App\Models\Pembangunan;

class StoreDokumentasiPembangunanDetailController extends Controller
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
    public function __invoke(StoreDokumentasiPembangunanRequest $request, Pembangunan $pembangunan)
    {
        $dokumentasi = DokumentasiPembangunan::create($request->validated()+['pembangunan_id'=>$pembangunan->id]);
        if ($request->file('gambar')) {
            // jika ada upload logo baru
            $path = $request->file('gambar')->store('desa/pembangunan/dokumentasi/gambar');
            $dokumentasi->forceFill([
                'gambar' => $path
            ])->save();
        }
        return redirect('site/dokumentasi/pembangunan/'.$pembangunan->id)->with('success', __('Data Created Successfully!'));
    }
}