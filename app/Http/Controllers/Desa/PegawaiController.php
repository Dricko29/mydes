<?php

namespace App\Http\Controllers\Desa;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\AttrAgama;
use App\Models\AttrKelamin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\AttrPendidikanKeluarga;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(!Gate::allows('read pegawai'), 403);
        if ($request->ajax()) {
            $model = Pegawai::with('attrKelamin', 'jabatan', 'attrPendidikanKeluarga', 'attrAgama');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('jabatans', function ($model) {
                    return $model->jabatan->nama;
                })
                ->editColumn('attr_kelamins', function ($model) {
                    return $model->attrKelamin->nama;
                })
                ->editColumn('attr_pendidikan_keluargas', function ($model) {
                    return $model->attrPendidikanKeluarga->nama;
                })
                ->editColumn('attr_agamas', function ($model) {
                    return $model->attrAgama->nama;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge bg-success">Aktif</span>';
                    } else {
                        return '<span class="badge bg-success">Nonaktif</span>';
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        return view('desa.pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!Gate::allows('create pegawai'), 403);
        $kelamins = AttrKelamin::all();
        $jabatans = Jabatan::all();
        $pendidikans = AttrPendidikanKeluarga::all();
        $agamas = AttrAgama::all();
        return view('desa.pegawai.create', compact(
            'agamas',
            'pendidikans',
            'jabatans',
            'kelamins'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawaiRequest $request)
    {
        abort_if(!Gate::allows('create pegawai'), 403);
        if($request->jabatan_id == 1){
            return redirect()->back()->with('error', 'Kepala Desa Sudah Ada!');
        }else{
            $data = Pegawai::create($request->validated());
            if ($request->file('foto')) {
                // jika ada upload foto baru
                $path = $request->file('foto')->store('desa/pegawai/foto');
                $data->forceFill([
                    'foto' => $path
                ])->save();
            }
            return redirect()->route('site.pegawai.index')->with('success', __('Data Created Successfully!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        abort_if(!Gate::allows('read pegawai'), 403);
        return view('desa.pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        abort_if(!Gate::allows('update pegawai'), 403);
        $kelamins = AttrKelamin::all();
        $jabatans = Jabatan::all();
        $pendidikans = AttrPendidikanKeluarga::all();
        $agamas = AttrAgama::all();
        return view('desa.pegawai.edit', compact(
            'agamas',
            'pendidikans',
            'jabatans',
            'kelamins',
            'pegawai'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        abort_if(!Gate::allows('update pegawai'), 403);   
        $pegawai->update($request->validated());
        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $path = $request->file('foto')->store('desa/pegawai/foto');
            $pegawai->forceFill([
                'foto' => $path
            ])->save();
        }
        return redirect()->route('site.pegawai.index')->with('success', __('Data Changed Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        try {
            abort_if(!Gate::allows('delete pegawai'), 403);   
            $pegawai->delete();
            if ($pegawai->foto) {
                Storage::delete($pegawai->foto);
            }
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