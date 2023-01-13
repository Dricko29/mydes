<?php

namespace App\Http\Controllers\Statik;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class ListPengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pengaduans = Pengaduan::with('tanggapanPengaduans')->latest()->paginate(9);
        return view('pages.pengaduan.list-pengaduan', compact('pengaduans'));
    }
}