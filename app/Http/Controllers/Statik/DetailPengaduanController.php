<?php

namespace App\Http\Controllers\Statik;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DetailPengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pengaduan $pengaduan)
    {
        $pengaduan->load('tanggapanPengaduans');
        return view('pages.pengaduan.detail',compact('pengaduan'));
    }
}