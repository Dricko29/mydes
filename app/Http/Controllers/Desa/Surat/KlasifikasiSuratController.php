<?php

namespace App\Http\Controllers\Desa\Surat;

use Illuminate\Http\Request;
use App\Models\KlasifikasiSurat;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreKlasifikasiSuratRequest;
use App\Http\Requests\UpdateKlasifikasiSuratRequest;

class KlasifikasiSuratController extends Controller
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
            $model = KlasifikasiSurat::when($status, function($query) use ($status){
                $query->where('status', $status);
            });
            
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('action', 'desa.surat.klasifikasi.action')
                ->addColumn('info_status', function($model){
                    if ($model->status == 1) {
                        return '<span class="badge bg-primary">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Nonaktif</span>';
                    }
                    
                })
                ->rawColumns(['info_status'])
                ->make(true);
        }
        return view('desa.surat.klasifikasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desa.surat.klasifikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKlasifikasiSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKlasifikasiSuratRequest $request)
    {
        KlasifikasiSurat::create($request->validated());
        return redirect()->route('site.klasifikasiSurat.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KlasifikasiSurat  $klasifikasiSurat
     * @return \Illuminate\Http\Response
     */
    public function show(KlasifikasiSurat $klasifikasiSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KlasifikasiSurat  $klasifikasiSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(KlasifikasiSurat $klasifikasiSurat)
    {
        return view('desa.surat.klasifikasi.edit', compact('klasifikasiSurat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKlasifikasiSuratRequest  $request
     * @param  \App\Models\KlasifikasiSurat  $klasifikasiSurat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKlasifikasiSuratRequest $request, KlasifikasiSurat $klasifikasiSurat)
    {
        $klasifikasiSurat->update($request->validated());
        return redirect()->route('site.klasifikasiSurat.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KlasifikasiSurat  $klasifikasiSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(KlasifikasiSurat $klasifikasiSurat)
    {
        try {
            $klasifikasiSurat->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!')
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'msg' => __('Whoops! Something went wrong.')
            ]);
        }
    }

    public function bulkDelete(Request $request)
    {
        try {
            KlasifikasiSurat::whereIn('id', $request->id)->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!')
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'msg' => __('Whoops! Something went wrong.')
            ]);
        }
        
    }
}