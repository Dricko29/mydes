<?php

namespace App\Http\Controllers\Keluarga;

use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\LogPendudukMasuk;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePendudukRequest;

class StorePendudukMasukController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StorePendudukRequest $request)
    {
        try {
            DB::beginTransaction();
            $keluarga = Keluarga::create([
                'no_keluarga' => $request->no_keluarga,
                'tanggal_terdaftar' => Carbon::now(),
                'alamat' => $request->alamat ? $request->alamat : '-'
            ]);
            $data = Penduduk::create($request->validated() + ['keluarga_id' => $keluarga->id]);
            if ($request->file('foto')) {
                // jika ada upload foto baru
                $path = $request->file('foto')->store('desa/penduduk/foto');
                $data->forceFill([
                    'foto' => $path
                ])->save();
            }
            LogPendudukMasuk::create([
                'penduduk_id' => $data->id,
                'tanggal_lapor' => $request->tanggal_lapor,
                'tanggal_masuk' => $request->tanggal_masuk
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('site.keluarga.index')->with('error', __('Whoops! Something went wrong.'));
        }
        return redirect()->route('site.keluarga.index')->with('success', __('Data Created Successfully!'));
    }
}