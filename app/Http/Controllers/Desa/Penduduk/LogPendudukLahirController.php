<?php

namespace App\Http\Controllers\Desa\Penduduk;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\LogPendudukLahir;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class LogPendudukLahirController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $model = LogPendudukLahir::with([
                'penduduk.attrKelamin'
            ]);
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('penduduk.tanggal_lahir', function(LogPendudukLahir $logPendudukLahir){
                    return Carbon::parse($logPendudukLahir->penduduk->tanggal_lahir)->format('d-m-Y');
                })
                ->make(true);
        }
        return view('desa.penduduk.penduduk-lahir');
    }
}