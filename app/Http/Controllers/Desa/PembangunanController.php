<?php

namespace App\Http\Controllers\Desa;

use App\Models\SumberDana;
use App\Models\Pembangunan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DokumentasiPembangunan;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StorePembangunanRequest;
use App\Http\Requests\UpdatePembangunanRequest;

class PembangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('read pembangunan'), 403);
        if($request->ajax()){
            $model = Pembangunan::with('sumberDana');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    $btn = '<a href="' . route('site.pembangunan.edit', $row->id) . '" class="btn-edit btn btn-success btn-sm" style="width:80px">Edit</a>
                        <a href="' . route('site.pembangunan.show', $row->id) . '" class="btn-edit btn btn-info btn-sm" style="width:80px">Detail</a>
                        <button onclick="hapus(' . $row->id . ')"   class="btn-delete btn btn-danger btn-sm" style="width:80px">Delete</button>';
                    return $btn;
                })
                ->addColumn('sumber_dana', function ($row) {
                    return $row->sumberDana->nama;
                })
                ->editColumn('anggaran', function ($row) {
                    $data = $row->formatRupiah('anggaran');
                    return $data;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('desa.pembangunan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('create pembangunan'), 403);
        $sumber = SumberDana::all();
        return view('desa.pembangunan.create', compact('sumber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePembangunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembangunanRequest $request)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('create pembangunan'), 403);
        Pembangunan::create($request->validated() + ['waktu' => $request->waktu . ' ' . $request->lama]);
        return redirect()->route('site.pembangunan.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function show(Pembangunan $pembangunan)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('read pembangunan'), 403);
        $progres = DokumentasiPembangunan::where('pembangunan_id', $pembangunan->id)->max('progres');
        return view('desa.pembangunan.show', compact('pembangunan', 'progres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembangunan $pembangunan)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('update pembangunan'), 403);
        $sumber = SumberDana::all();
        $waktu = explode(' ', $pembangunan->waktu);
        return view('desa.pembangunan.edit', compact('pembangunan', 'sumber', 'waktu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembangunanRequest  $request
     * @param  \App\Models\Pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembangunanRequest $request, Pembangunan $pembangunan)
    {
        abort_if(!\Illuminate\Support\Facades\Gate::allows('update pembangunan'), 403);
        $pembangunan->update($request->validated() + ['waktu' => $request->waktu . ' ' . $request->lama]);
        return redirect()->route('site.pembangunan.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembangunan  $pembangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembangunan $pembangunan)
    {
        try {
            //code...
            abort_if(!\Illuminate\Support\Facades\Gate::allows('delete pembangunan'), 403);
            $pembangunan->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!')
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'msg' => __('Whoops! Something went wrong.')
            ]);
            //throw $th;
        }
    }
}