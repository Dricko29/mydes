<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuratRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateSuratRequest;
use App\Models\KlasifikasiSurat;

class SuratController extends Controller
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
            $model = Surat::query();
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('info_status', function ($model) {
                    if ($model->status == 1) {
                        return '<span class="badge bg-primary">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Nonaktif</span>';
                    }
                })
                ->rawColumns(['info_status'])
                ->make(true);
        }
        return view('desa.surat.pengaturan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasifikasi = KlasifikasiSurat::all();
        return view('desa.surat.pengaturan.create', compact('klasifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuratRequest $request)
    {
        Surat::create($request->validated()+ ['masa_berlaku' => $request->masa_berlaku . ' ' . $request->lama]);
        return redirect()->route('site.surat.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuratRequest  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuratRequest $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        try {
            $surat->delete();
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
            Surat::whereIn('id', $request->id)->delete();
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