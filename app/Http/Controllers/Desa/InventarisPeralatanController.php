<?php

namespace App\Http\Controllers\Desa;

use App\Models\InvAsal;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\InvPenggunaan;
use App\Models\InvPenggunaBarang;
use App\Models\InventarisPeralatan;
use App\Http\Controllers\Controller;
use App\Models\InvKategoriPeralatan;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreInventarisPeralatanRequest;
use App\Http\Requests\UpdateInventarisPeralatanRequest;

class InventarisPeralatanController extends Controller
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
            $model = InventarisPeralatan::with('invAsal');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('asal', function ($row) {
                    return $row->invAsal->nama;
                })
                ->editColumn('harga', function ($row) {
                    return $row->formatRupiah('harga');
                })
                ->make(true);
        }
        return view('desa.inventaris.peralatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!Gate::allows('create inventaris'), 403);
        $kategoriPermes = InvKategoriPeralatan::all();
        $asal = InvAsal::all();
        $penggunaan = InvPenggunaan::all();
        $penggunaBarang = InvPenggunaBarang::all();
        return view('desa.inventaris.peralatan.create', compact(
            'penggunaan',
            'penggunaBarang',
            'kategoriPermes',
            'asal'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventarisPeralatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventarisPeralatanRequest $request)
    {
        abort_if(!Gate::allows('create inventaris'), 403);
        InventarisPeralatan::create($request->validated());
        return redirect()->route('site.inventarisPeralatan.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventarisPeralatan  $inventarisPeralatan
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisPeralatan $inventarisPeralatan)
    {
        abort_if(!Gate::allows('read inventaris'), 403);
        return view('desa.inventaris.peralatan.show', compact('inventarisPeralatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventarisPeralatan  $inventarisPeralatan
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisPeralatan $inventarisPeralatan)
    {
        abort_if(!Gate::allows('update inventaris'), 403);
        $kategoriPermes = InvKategoriPeralatan::all();
        $asal = InvAsal::all();
        $penggunaan = InvPenggunaan::all();
        $penggunaBarang = InvPenggunaBarang::all();
        return view('desa.inventaris.peralatan.edit', compact(
            'penggunaan',
            'penggunaBarang',
            'kategoriPermes',
            'asal',
            'inventarisPeralatan'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventarisPeralatanRequest  $request
     * @param  \App\Models\InventarisPeralatan  $inventarisPeralatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventarisPeralatanRequest $request, InventarisPeralatan $inventarisPeralatan)
    {
        abort_if(!Gate::allows('update inventaris'), 403);
        $inventarisPeralatan->update($request->validated());
        return redirect()->route('site.inventarisPeralatan.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventarisPeralatan  $inventarisPeralatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisPeralatan $inventarisPeralatan)
    {
        try {
            //code...
            abort_if(!Gate::allows('delete inventaris'), 403);
            $inventarisPeralatan->delete();
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