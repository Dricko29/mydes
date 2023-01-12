<?php

namespace App\Http\Controllers\Desa;

use App\Models\InvAsal;
use Illuminate\Http\Request;
use App\Models\InvJenisAsset;
use App\Models\InvKategoriAsset;
use App\Http\Controllers\Controller;
use App\Models\InventarisAssetTetap;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreInventarisAssetTetapRequest;
use App\Http\Requests\UpdateInventarisAssetTetapRequest;

class InventarisAssetTetapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = InventarisAssetTetap::with('invAsal');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('jenis_asset', function ($row) {
                    return $row->invJenisAsset->nama;
                })
                ->addColumn('asal', function ($row) {
                    return $row->invAsal->nama;
                })
                ->editColumn('harga', function ($row) {
                    return $row->formatRupiah('harga');
                })
                ->make(true);
        }
        return view('desa.inventaris.assetTetap.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriAssets = InvKategoriAsset::all();
        $jenisAssets = InvJenisAsset::all();
        $asal = InvAsal::all();
        return view('desa.inventaris.assetTetap.create', compact(
            'asal',
            'kategoriAssets',
            'jenisAssets'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventarisAssetTetapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventarisAssetTetapRequest $request)
    {
        InventarisAssetTetap::create($request->validated());
        return redirect()->route('site.inventarisAssetTetap.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventarisAssetTetap  $inventarisAssetTetap
     * @return \Illuminate\Http\Response
     */
    public function show(InventarisAssetTetap $inventarisAssetTetap)
    {
        return view('desa.inventaris.assetTetap.show',compact('inventarisAssetTetap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventarisAssetTetap  $inventarisAssetTetap
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarisAssetTetap $inventarisAssetTetap)
    {
        $kategoriAssets = InvKategoriAsset::all();
        $jenisAssets = InvJenisAsset::all();
        $asal = InvAsal::all();
        return view('desa.inventaris.assetTetap.edit', compact(
            'asal',
            'kategoriAssets',
            'jenisAssets',
            'inventarisAssetTetap'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventarisAssetTetapRequest  $request
     * @param  \App\Models\InventarisAssetTetap  $inventarisAssetTetap
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventarisAssetTetapRequest $request, InventarisAssetTetap $inventarisAssetTetap)
    {
        $inventarisAssetTetap->update($request->validated());
        return redirect()->route('site.inventarisAssetTetap.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventarisAssetTetap  $inventarisAssetTetap
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarisAssetTetap $inventarisAssetTetap)
    {
        $inventarisAssetTetap->delete();
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!')
        ]);
    }
}