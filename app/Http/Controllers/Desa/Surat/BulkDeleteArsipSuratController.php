<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Http\Controllers\Controller;
use App\Models\LogSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BulkDeleteArsipSuratController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $file = LogSurat::whereIn('id', $request->id)->pluck('file');
            // return $file;
            LogSurat::whereIn('id', $request->id)->delete();
            foreach($file as $f)
            {
                Storage::delete($f);
            }
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