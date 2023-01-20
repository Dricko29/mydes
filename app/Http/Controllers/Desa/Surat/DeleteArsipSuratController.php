<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteArsipSuratController extends Controller
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
    public function __invoke(Request $request)
    {
        //
    }
}