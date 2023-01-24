<?php

namespace App\Http\Controllers\Log;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\LogPendudukMati;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AttrStatusDasar;
use App\Models\LogPendudukPindah;
use Illuminate\Support\Facades\Gate;

class StorePendudukPindahController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Penduduk $penduduk)
    {
        abort_if(!Gate::allows('update penduduk'), 403);
        $request->validate([
            'penduduk_id' => 'required',
            'tanggal_lapor' => 'required',
            'tanggal_peristiwa' => 'required',
            'tujuan_pindah' => 'required',
            'alamat_tujuan' => 'required',
            'ket' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $status = AttrStatusDasar::where('nama', 'like', '%'.$request->status.'%')->first();
            $penduduk = Penduduk::find($request->penduduk_id);
            $penduduk->update([
                'attr_status_dasar_id' => $status->id
            ]);
            
            LogPendudukPindah::create([
                'penduduk_id' => $request->penduduk_id,
                'tanggal_lapor' => $request->tanggal_lapor,
                'tanggal_peristiwa' => $request->tanggal_peristiwa,
                'tujuan_pindah' => $request->tujuan_pindah,
                'alamat_tujuan' => $request->alamat_tujuan,
                'ket' => $request->ket,
            ]);
            DB::commit();
            return redirect()->route('site.penduduk.index')->with('success', __('Data Updated Successfully!'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('site.penduduk.index')->with('error', $th->getMessage());
        }
    }
}