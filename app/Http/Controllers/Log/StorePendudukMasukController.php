<?php

namespace App\Http\Controllers\Log;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\LogPendudukMasuk;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
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
        abort_if(!Gate::allows('create penduduk'), 403);
        try {
            DB::beginTransaction();
            
            $penduduk = Penduduk::create($request->validated());
            if ($request->file('foto')) {
                // jika ada upload foto baru
                $path = $request->file('foto')->store('desa/penduduk/foto');
                $penduduk->forceFill([
                    'foto' => $path
                ])->save();
            }
            LogPendudukMasuk::create([
                'penduduk_id' => $penduduk->id,
                'tanggal_lapor' => $request->tanggal_lapor,
                'tanggal_masuk' => $request->tanggal_masuk
            ]);
            DB::commit();
            return redirect()->route('site.penduduk.index')->with('success', __('Data Created Successfully!'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('site.penduduk.index')->with('error', __('Whoops! Something went wrong.'));
        }
        
    }
}