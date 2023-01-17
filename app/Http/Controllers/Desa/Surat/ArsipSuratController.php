<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Models\LogSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreLogSuratRequest;
use App\Http\Requests\UpdateLogSuratRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ArsipSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->status;
            $model = LogSurat::with('penduduk', 'surat.klasifikasiSurat', 'pegawai', 'nomorSurat')->latest();
            return DataTables::eloquent($model)
                ->addIndexColumn()
                // ->addColumn('action', function ($model) {
                //     return '<a href="' . $model->link . '" class="btn btn-sm btn-success">Buat</a>';
                // })
                // ->addColumn('kode', function(LogSurat $query){
                //     return $query->surat->klasifikasiSurat->kode;
                // })
                ->editColumn('created_at', function($model){
                    return Carbon::parse($model->created_at)->isoFormat('LLL');
                })
                ->addColumn('user', function($model) {
                    return $model->creator->name;
                })
                ->addColumn('info_status', function ($model) {
                    if ($model->status == 1) {
                        return '<span class="badge bg-primary">Siap Cetak</span>';
                    } else {
                        return '<span class="badge bg-danger">Diperiksa</span>';
                    }
                })
                ->rawColumns(['action', 'info_status', 'kode', 'user'])
                ->make(true);
        }
        return view('desa.surat.arsip.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLogSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLogSuratRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogSurat  $logSurat
     * @return \Illuminate\Http\Response
     */
    public function show(LogSurat $logSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogSurat  $logSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(LogSurat $logSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogSuratRequest  $request
     * @param  \App\Models\LogSurat  $logSurat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLogSuratRequest $request, LogSurat $logSurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogSurat  $logSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogSurat $logSurat)
    {
        try {
            if ($logSurat->file) {
                Storage::delete($logSurat->file);
            }
            $logSurat->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'success',
                'msg' => $th->getMessage(),
            ]);
        }
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!'),
        ]);
    }
}