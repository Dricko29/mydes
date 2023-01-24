<?php

namespace App\Http\Controllers\Desa;

use Carbon\Carbon;
use App\Models\InvAsal;
use Illuminate\Http\Request;
use App\Models\InvStatusTanah;
use App\Models\InvPenggunaBarang;
use App\Models\InventarisBangunan;
use App\Models\InvKondisiBangunan;
use App\Models\InvKategoriBangunan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreInventarisBangunanRequest;
use App\Http\Requests\UpdateInventarisBangunanRequest;

class InventarisBangunanController extends Controller
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
            $model = InventarisBangunan::with('invAsal');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('kondisi', function ($row) {
                    return $row->invKondisiBangunan->nama;
                })
                ->addColumn('asal', function ($row) {
                    return $row->invAsal->nama;
                })
                ->editColumn('harga', function ($row) {
                    return $row->formatRupiah('harga');
                })
                ->editColumn('tanggal_dokumen_bangunan', function($model){
                    return Carbon::parse($model->tanggal_dokumen_bangunan)->format('d-m-Y');
                })
                ->make(true);
        }
        return view('desa.inventaris.bangunan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!Gate::allows('create inventaris'), 403);
        $kategoriBangunan = InvKategoriBangunan::all();
        $asal = InvAsal::all();
        $kondisi = InvKondisiBangunan::all();
        $statusTanah = InvStatusTanah::all();
        $penggunaBarang = InvPenggunaBarang::all();
        return view('desa.inventaris.bangunan.create', compact(
            'kondisi',
            'penggunaBarang',
            'kategoriBangunan',
            'asal',
            'statusTanah'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventarisBangunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventarisBangunanRequest $request)
    {
        abort_if(!Gate::allows('create inventaris'), 403);
        InventarisBangunan::create($request->validated());
        return redirect()->route('site.inventarisBangunan.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventarisBangunan  $inventarisBangunan
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisBangunan $inventarisBangunan)
    {
        abort_if(!Gate::allows('read inventaris'), 403);
        return view('desa.inventaris.bangunan.show', compact('inventarisBangunan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventarisBangunan  $inventarisBangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisBangunan $inventarisBangunan)
    {
        abort_if(!Gate::allows('update inventaris'), 403);
        $kategoriBangunan = InvKategoriBangunan::all();
        $asal = InvAsal::all();
        $kondisi = InvKondisiBangunan::all();
        $statusTanah = InvStatusTanah::all();
        $penggunaBarang = InvPenggunaBarang::all();
        return view('desa.inventaris.bangunan.edit', compact(
            'kondisi',
            'penggunaBarang',
            'kategoriBangunan',
            'asal',
            'statusTanah',
            'inventarisBangunan'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventarisBangunanRequest  $request
     * @param  \App\Models\InventarisBangunan  $inventarisBangunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventarisBangunanRequest $request, InventarisBangunan $inventarisBangunan)
    {
        abort_if(!Gate::allows('update inventaris'), 403);
        $inventarisBangunan->update($request->validated());
        return redirect()->route('site.inventarisBangunan.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventarisBangunan  $inventarisBangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisBangunan $inventarisBangunan)
    {
        try {
            abort_if(!Gate::allows('delete inventaris'), 403);
            $inventarisBangunan->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!'),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'msg' => __('Whoops! Something went wrong.'),
            ]);
        }
    }
}