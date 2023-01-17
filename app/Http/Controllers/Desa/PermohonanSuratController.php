<?php

namespace App\Http\Controllers\Desa;

use Illuminate\Http\Request;
use App\Models\PermohonanSurat;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StorePermohonanSuratRequest;
use App\Http\Requests\UpdatePermohonanSuratRequest;
use Carbon\Carbon;

class PermohonanSuratController extends Controller
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
            $model = PermohonanSurat::with(['penduduk', 'surat'])->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            });
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('info_status', function ($model) {
                    if ($model->status == 1) {
                        return '<a href="/site/permohonan/'.$model->id.'/surat/'.$model->surat_id.'/penduduk/'.$model->penduduk_id.'"><span class="badge bg-info">Sedang Diperiksa</span></a>';
                    } elseif ($model->status == 2) {
                        return '<a href="/site/permohonan/'.$model->id.'/status/3"><span class="badge bg-warning">Menunggu Ditandatangani</span></a>';
                    } elseif ($model->status == 3){
                        return '<a href="/site/permohonan/' . $model->id . '/status/4"><span class="badge bg-primary">Siap Diambil</span></a>';
                    } elseif ($model->status == 4){
                        return '<a href="#"><span class="badge bg-success">Sudah Diambil</span></a>';
                    }elseif ($model->status == 0){
                        return '<a href="#"><span class="badge bg-danger">Ditolak</span></a>';
                        
                    }
                })
                ->editColumn('created_at', function($model){
                  return Carbon::parse($model->created_at)->isoFormat('LLL');  
                })
                ->rawColumns(['info_status'])
                ->make(true);
        }
        return view('desa.permohonan-surat.index');
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
     * @param  \App\Http\Requests\StorePermohonanSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermohonanSuratRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermohonanSurat  $permohonanSurat
     * @return \Illuminate\Http\Response
     */
    public function show(PermohonanSurat $permohonanSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermohonanSurat  $permohonanSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(PermohonanSurat $permohonanSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermohonanSuratRequest  $request
     * @param  \App\Models\PermohonanSurat  $permohonanSurat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermohonanSuratRequest $request, PermohonanSurat $permohonanSurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermohonanSurat  $permohonanSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermohonanSurat $permohonanSurat)
    {
        try {
            $permohonanSurat->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Updated Successfully!')
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'success',
                'msg' => $th->getMessage()
            ]);
        }
    }

}