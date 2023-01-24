<?php

namespace App\Http\Controllers\Log;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\LogPendudukMati;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AttrStatusDasar;
use Illuminate\Support\Facades\Gate;

class StorePendudukMatiController extends Controller
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
            'tempat_kematian' => 'required',
            'waktu_kematian' => 'required',
            'penyebab_kematian' => 'required',
            'penerang_kematian' => 'required',
            'no_akta_kematian' => 'nullable',
            'anak_ke' => 'nullable',
            'ket' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $status = AttrStatusDasar::where('nama', 'like', '%'.$request->status.'%')->first();
            $penduduk = Penduduk::find($request->penduduk_id);
            $penduduk->update([
                'attr_status_dasar_id' => $status->id
            ]);
            
            LogPendudukMati::create([
                'penduduk_id' => $request->penduduk_id,
                'tanggal_lapor' => $request->tanggal_lapor,
                'tanggal_peristiwa' => $request->tanggal_peristiwa,
                'tempat_kematian' => $request->tempat_kematian,
                'waktu_kematian' => $request->waktu_kematian,
                'penyebab_kematian' => $request->penyebab_kematian,
                'penerang_kematian' => $request->penerang_kematian,
                'no_akta_kematian' => $request->no_akta_kematian,
                'anak_ke' => $request->anak_ke,
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