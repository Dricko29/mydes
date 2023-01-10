<?php

namespace App\Http\Controllers\Akun;

use App\Models\User;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StoreAkunPendudukController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Penduduk $penduduk)
    {
        try {
            DB::beginTransaction();
            
            $validation = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);

            $user = User::create($validation + [
                'password' => Hash::make('password'),
            ])->assignRole('user');

            $penduduk->forceFill([
                'user_id' => $user->id
            ])->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect('site/penduduk/'.$penduduk->id)->with('success', __('Data Created Successfully!'));
    }
}