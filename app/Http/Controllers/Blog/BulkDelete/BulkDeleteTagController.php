<?php

namespace App\Http\Controllers\Blog\BulkDelete;

use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BulkDeleteTagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
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
            Tag::whereIn('id', $request->id)->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!')
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'msg' => __('Whoops! Something went wrong.')
            ]);
        }
    }
}