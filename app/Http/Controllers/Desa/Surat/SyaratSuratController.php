<?php

namespace App\Http\Controllers\Desa\Surat;

use App\Models\SyaratSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreSyaratSuratRequest;
use App\Http\Requests\UpdateSyaratSuratRequest;

class SyaratSuratController extends Controller
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
            $model = SyaratSurat::query();
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->make(true);
        }
        return view('desa.surat.syarat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desa.surat.syarat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSyaratSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSyaratSuratRequest $request)
    {
        SyaratSurat::create($request->validated());
        return redirect()->route('site.syaratSurat.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SyaratSurat  $syaratSurat
     * @return \Illuminate\Http\Response
     */
    public function show(SyaratSurat $syaratSurat)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SyaratSurat  $syaratSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(SyaratSurat $syaratSurat)
    {
        return view('desa.surat.syarat.edit', compact('syaratSurat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSyaratSuratRequest  $request
     * @param  \App\Models\SyaratSurat  $syaratSurat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSyaratSuratRequest $request, SyaratSurat $syaratSurat)
    {
        $syaratSurat->update($request->validated());
        return redirect()->route('site.syaratSurat.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SyaratSurat  $syaratSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SyaratSurat $syaratSurat)
    {
        try {
            $syaratSurat->delete();
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
            SyaratSurat::whereIn('id', $request->id)->delete();
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