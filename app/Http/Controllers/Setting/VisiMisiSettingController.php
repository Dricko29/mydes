<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisiMisiSettingController extends Controller
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
        $misi = json_decode(settings()->group('desa')->get('misi'));
        return view('setting.visi-misi', compact('misi'));
    }
}