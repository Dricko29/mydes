<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiTtdController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|kades']);
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pegawai $pegawai)
    {
        $pegawai->forceFill([
            'ttd' => !$pegawai->ttd
        ])->save();
        return redirect()->back();
    }
}