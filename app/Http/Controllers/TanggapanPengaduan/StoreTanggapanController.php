<?php

namespace App\Http\Controllers\TanggapanPengaduan;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\TanggapanPengaduan;
use Illuminate\Http\Request;

class StoreTanggapanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pengaduan $pengaduan)
    {
        TanggapanPengaduan::create([
            'pengaduan_id' => $pengaduan->id,
           'respon' => $request->respon 
        ]);

        return redirect('site/pengaduan/'.$pengaduan->id)->with('success', 'Tanggapan Berhasil');
        
    }
}