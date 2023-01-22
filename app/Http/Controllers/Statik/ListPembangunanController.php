<?php

namespace App\Http\Controllers\Statik;

use App\Models\Pembangunan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListPembangunanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pembangunans = Pembangunan::with(['dokumentasiPembangunans' => function($q){
            return $q->latest()->first();
        }])->latest()->paginate(6);
        // return $pembangunans;
        return view('pages.pembangunan.list-pembangunan',compact('pembangunans'));
    }
}