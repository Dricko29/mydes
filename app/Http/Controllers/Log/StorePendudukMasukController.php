<?php

namespace App\Http\Controllers\Log;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePendudukRequest;
use App\Models\LogPendudukMasuk;

class StorePendudukMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|petugas|kades']);
    }
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