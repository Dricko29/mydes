<?php

namespace App\Http\Controllers\Desa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\InventarisKonstruksiBerjalan;
use App\Http\Requests\StoreInventarisKonstruksiBerjalanRequest;
use App\Http\Requests\UpdateInventarisKonstruksiBerjalanRequest;

class InventarisKonstruksiBerjalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = InventarisKonstruksiBerjalan::with('invAsal', 'invFisikBangunan');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('fisik_bangunan', function ($row) {
                    return $row->invFisikBangunan->nama;
                })
                ->addColumn('asal', function ($row) {
                    return $row->invAsal->nama;
                })
                ->editColumn('harga', function ($row) {
                    return $row->formatRupiah('harga');
                })
                ->make(true);
        }
        return view('desa.inventaris.konstruksiBerjalan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asal = \App\Models\InvAsal::all();
        $fisikBangunan = \App\Models\InvFisikBangunan::all();
        $statusTanah = \App\Models\InvStatusTanah::all();
        return view('desa.inventaris.konstruksiBerjalan.create', compact(
            'fisikBangunan',
            'asal',
            'statusTanah'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventarisKonstruksiBerjalanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventarisKonstruksiBerjalanRequest $request)
    {
        InventarisKonstruksiBerjalan::create($request->validated());
        return redirect()->route('site.inventarisKonstruksiBerjalan.index')->with('success',__('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventarisKonstruksiBerjalan  $inventarisKonstruksiBerjalan
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisKonstruksiBerjalan $inventarisKonstruksiBerjalan)
    {
        return view('desa.inventaris.konstruksiBerjalan.show', compact('inventarisKonstruksiBerjalan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventarisKonstruksiBerjalan  $inventarisKonstruksiBerjalan
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisKonstruksiBerjalan $inventarisKonstruksiBerjalan)
    {
        $asal = \App\Models\InvAsal::all();
        $fisikBangunan = \App\Models\InvFisikBangunan::all();
        $statusTanah = \App\Models\InvStatusTanah::all();
        return view('desa.inventaris.konstruksiBerjalan.edit', compact(
            'fisikBangunan',
            'asal',
            'statusTanah',
            'inventarisKonstruksiBerjalan'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventarisKonstruksiBerjalanRequest  $request
     * @param  \App\Models\InventarisKonstruksiBerjalan  $inventarisKonstruksiBerjalan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventarisKonstruksiBerjalanRequest $request, InventarisKonstruksiBerjalan $inventarisKonstruksiBerjalan)
    {
        $inventarisKonstruksiBerjalan->update($request->validated());
        return redirect()->route('site.inventarisKonstruksiBerjalan.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventarisKonstruksiBerjalan  $inventarisKonstruksiBerjalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisKonstruksiBerjalan $inventarisKonstruksiBerjalan)
    {
        $inventarisKonstruksiBerjalan->delete();
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!')
        ]);
    }
}