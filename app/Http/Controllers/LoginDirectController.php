<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginDirectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return to_route('admin.dashboard');
        } elseif ($user->hasRole('petugas')) {
            return to_route('petugas.dashboard');
        } elseif ($user->hasRole('kades')) {
            return to_route('kades.dashboard');
        } elseif ($user->hasRole('user')) {
            return to_route('user.dashboard');
        }else{
            return abort(404);
        }
        
    }
}