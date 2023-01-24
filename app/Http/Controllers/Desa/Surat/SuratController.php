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
        abort_if(!\Illuminate\Support\Facades\Gate::allows('read surat'), 403);
        if ($request->ajax()) {
            $status = $request->status;
            $model = Surat::when($status, function ($query) use ($status) {
                $query->where('status', $status);
            });
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('layanan', function($model){
                    if ($model->layanan == 1) {
                        return '<span class="badge bg-primary">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Nonaktif</span>';
                    }
                })
                ->editColumn('status', function($model){
                    if ($model->status == 1) {
                        return '<span class="badge bg-primary">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Nonaktif</span>';
                    }
                })
                ->rawColumns(['status', 'layanan'])
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
        abort_if(!\Illuminate\Support\Facades\Gate::allows('create surat'), 403);
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
        abort_if(!\Illuminate\Support\Facades\Gate::allows('create surat'), 403);
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
        abort_if(!\Illuminate\Support\Facades\Gate::allows('update surat'), 403);
        $klasifikasi = KlasifikasiSurat::all();
        return view('desa.surat.pengaturan.edit', compact('klasifikasi', 'surat'));
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
        abort_if(!\Illuminate\Support\Facades\Gate::allows('update surat'), 403);
        $surat->update($request->validated());
        return redirect()->route('site.surat.index')->with('success', __('Data Updated Successfully!'));
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
            abort_if(!\Illuminate\Support\Facades\Gate::allows('delete surat'), 403);
            $surat->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!')
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                // 'msg' => __('Whoops! Something went wrong.')
                'msg' => $th->getMessage()
            ]);
        }
    }

    public function bulkDelete(Request $request)
    {
        try {
            abort_if(!\Illuminate\Support\Facades\Gate::allows('delete surat'), 403);
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