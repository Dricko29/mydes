<?php

namespace App\Http\Controllers\Pembangunan;

use App\Models\Pembangunan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DokumentasiPembangunan;
use Illuminate\Support\Facades\Storage;

class DeleteDokumentasiPembangunanDetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pembangunan $pembangunan, DokumentasiPembangunan $dokumentasiPembangunan)
    {

        if ($dokumentasiPembangunan->gambar) {
            Storage::delete($dokumentasiPembangunan->gambar);
        }
        $dokumentasiPembangunan->delete();
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!')
        ]);
    }
}