<?php

namespace App\Http\Controllers\Desa\PermohonanSurat;

use App\Http\Controllers\Controller;
use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

class BulkDeletePermohonanSuratController extends Controller
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
        try {

            // return $file;
            PermohonanSurat::whereIn('id', $request->id)->delete();
            // foreach ($file as $f) {
            //     Storage::delete($f);
            // }
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!')
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                // 'msg' => __('Whoops! Something went wrong.')
                'msg' => $th->getMessage()
            ]);
        }
    }
}