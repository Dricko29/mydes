<?php

namespace App\Http\Controllers\Desa;

use App\Models\InventarisPeralatan;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreInventarisPeralatanRequest;
use App\Http\Requests\UpdateInventarisPeralatanRequest;
use App\Models\InvAsal;
use App\Models\InvKategoriPeralatan;
use App\Models\InvPenggunaan;
use App\Models\InvPenggunaBarang;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class InventarisPeralatanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|petugas|kades']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        $inventarisPeralatan->delete();
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!'),
        ]);
    }
}