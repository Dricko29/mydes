<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\LayananMandiri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, LayananMandiri $layananMandiri, User $user)
    {
        $user->forceFill([
            'password' => Hash::make('password')
        ])->save();
        return redirect()->route('site.layananMandiri.index')->with('success', __('Data Updated Successfully!'));
    }
}