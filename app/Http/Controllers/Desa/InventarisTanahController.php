<?php

namespace App\Http\Controllers\Desa;

use App\Models\InvAsal;
use App\Models\InvHakTanah;
use Illuminate\Http\Request;
use App\Models\InvPenggunaan;
use App\Models\InventarisTanah;
use App\Models\InvKategoriTanah;
use App\Models\InvPenggunaBarang;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreInventarisTanahRequest;
use App\Http\Requests\UpdateInventarisTanahRequest;
use Carbon\Carbon;

class InventarisTanahController extends Controller
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
        $inventarisTanah->delete();
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!'),
        ]);
    }
}