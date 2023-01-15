<?php

namespace App\Http\Controllers\Desa\Surat;

use Carbon\Carbon;
use App\Models\Surat;
use App\Models\Penduduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;
use Yajra\DataTables\Facades\DataTables;

class CetakSuratController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Penduduk $penduduk)
    {
        if ($request->ajax()) {
            $status = $request->status;
            $model = Surat::with('klasifikasiSurat');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('action', function($model){
                    return '<a href="'.$model->link.'/'.$model->id.'" class="btn btn-sm btn-success">Buat</a>';
                })
                ->addColumn('info_status', function ($model) {
                    if ($model->status == 1) {
                        return '<span class="badge bg-primary">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Nonaktif</span>';
                    }
                })
                ->rawColumns(['action', 'info_status'])
                ->make(true);
        }
        return view('desa.surat.cetak.index');
    }
}