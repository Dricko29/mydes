<?php

namespace App\Http\Controllers\Akun\LayananMandiri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterLayananMandiriController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('pages.layanan-mandiri.register-form');
    }
}