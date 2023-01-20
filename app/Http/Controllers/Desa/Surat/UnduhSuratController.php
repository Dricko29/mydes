<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Http\Controllers\Controller;
use App\Models\LogSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UnduhSuratController extends Controller
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
    public function __invoke(Request $request, $id)
    {
        $arsip = LogSurat::find($id);
        return Storage::download($arsip->file);
    }
}