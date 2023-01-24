<?php

namespace App\Http\Controllers\Desa;

use Carbon\Carbon;
use App\Models\InvAsal;
use App\Models\InvHakTanah;
use Illuminate\Http\Request;
use App\Models\InvPenggunaan;
use App\Models\InventarisTanah;
use App\Models\InvKategoriTanah;
use App\Models\InvPenggunaBarang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreInventarisTanahRequest;
use App\Http\Requests\UpdateInventarisTanahRequest;

class InventarisTanahController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(!Gate::allows('read inventaris'), 403);
        if ($request->ajax()) {
            $model = InventarisTanah::with('invAsal');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('asal', function ($row) {
                    return $row->invAsal->nama;
                })
                ->editColumn('harga', function ($row) {
                    return $row->formatRupiah('harga');
                })
                ->editColumn('tanggal_sertifikat', function($model){
                    return Carbon::parse($model->tanggal_sertifikat)->format('d-m-Y');
                })
                ->make(true);
        }
        return view('desa.inventaris.tanah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!Gate::allows('create inventaris'), 403);
        $kategoriTanah = InvKategoriTanah::all();
        $asal = InvAsal::all();
        $hakTanah = InvHakTanah::all();
        $penggunaan = InvPenggunaan::all();
        $penggunaBarang = InvPenggunaBarang::all();
        return view('desa.inventaris.tanah.create', compact(
            'hakTanah',
            'penggunaan',
            'penggunaBarang',
            'kategoriTanah',
            'asal'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventarisTanahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventarisTanahRequest $request)
    {
        abort_if(!Gate::allows('create inventaris'), 403);
        InventarisTanah::create($request->validated());
        return redirect()->route('site.inventarisTanah.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventarisTanah  $inventarisTanah
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisTanah $inventarisTanah)
    {
        abort_if(!Gate::allows('read inventaris'), 403);
        return view('desa.inventaris.tanah.show', compact('inventarisTanah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventarisTanah  $inventarisTanah
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisTanah $inventarisTanah)
    {
        abort_if(!Gate::allows('update inventaris'), 403);
        $kategoriTanah = InvKategoriTanah::all();
        $asal = InvAsal::all();
        $hakTanah = InvHakTanah::all();
        $penggunaan = InvPenggunaan::all();
        $penggunaBarang = InvPenggunaBarang::all();
        return view('desa.inventaris.tanah.edit', compact(
            'hakTanah',
            'penggunaan',
            'penggunaBarang',
            'kategoriTanah',
            'asal',
            'inventarisTanah'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventarisTanahRequest  $request
     * @param  \App\Models\InventarisTanah  $inventarisTanah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventarisTanahRequest $request, InventarisTanah $inventarisTanah)
    {
        abort_if(!Gate::allows('update inventaris'), 403);
        $inventarisTanah->update($request->validated());
        return redirect()->route('site.inventarisTanah.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventarisTanah  $inventarisTanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisTanah $inventarisTanah)
    {
        try {
            //code...
            abort_if(!Gate::allows('delete inventaris'), 403);
            $inventarisTanah->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!'),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'msg' => __('Whoops! Something went wrong.'),
            ]);
            //throw $th;
        }
    }
}