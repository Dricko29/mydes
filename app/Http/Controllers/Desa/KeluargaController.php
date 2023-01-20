<?php

namespace App\Http\Controllers\Desa;

use Carbon\Carbon;
use App\Models\Dusun;
use App\Models\AttrSuku;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\AttrAgama;
use App\Models\AttrBahasa;
use App\Models\AttrStatus;
use App\Models\AttrKelamin;
use App\Models\AttrHubungan;
use Illuminate\Http\Request;
use App\Models\AttrPekerjaan;
use App\Models\AttrPendidikan;
use App\Models\AttrStatusDasar;
use App\Models\AttrStatusKawin;
use App\Models\AttrWarganegara;
use App\Models\AttrGolonganDarah;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AttrHubunganKeluarga;
use Novay\WordTemplate\WordTemplate;
use App\Models\AttrPendidikanKeluarga;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreKeluargaRequest;
use App\Http\Requests\UpdateKeluargaRequest;

class KeluargaController extends Controller
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
            $model = Keluarga::withCount('penduduks')->with(['penduduks' => function ($query) {
                $query->where('attr_hubungan_id', 1);
            }])->latest();
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('foto', function($model){
                    if ($model->penduduks->count()) {
                        return $model->penduduks->first()->foto_url;
                    } else {
                        return '-';
                    }
                    
                })
                ->addColumn('nik', function($model){
                    if ($model->penduduks->count()) {
                        return $model->penduduks->first()->nik;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('nama', function($model){
                    if ($model->penduduks->count()) {
                        return $model->penduduks->first()->nama;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('jenis_kelamin', function($model){
                    if ($model->penduduks->count()) {
                        return $model->penduduks->first()->attrKelamin->nama;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('alamat_penduduk', function($model){
                    if ($model->penduduks->count()) {
                        return $model->penduduks->first()->alamat;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('dusun', function($model){
                    if ($model->penduduks->count()) {
                        return $model->penduduks->first()->dusun->nama_dusun;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('rw', function($model){
                    if ($model->penduduks->count()) {
                        return $model->penduduks->first()->rukunWarga->nama_rw;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('rt', function($model){
                    if ($model->penduduks->count()) {
                        return $model->penduduks->first()->rukunTetangga->nama_rt;
                    } else {
                        return '-';
                    }
                })
                ->make(true);
        }
        return view('desa.keluarga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduks = Penduduk::where('keluarga_id', null)->where('attr_hubungan_id', 1)->get();
        if ($penduduks->count()) {
            $cek = false;
        }else{
            $cek = true;
        }
        return view('desa.keluarga.create', compact('penduduks', 'cek'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKeluargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeluargaRequest $request)
    {
        $penduduk = Penduduk::where('id', $request->penduduk_id)->first();
        try {
            $keluarga = Keluarga::create([
                'no_keluarga' => $request->no_keluarga,
                'tanggal_terdaftar' => Carbon::now(),
                'alamat' => $penduduk->alamat ? $penduduk->alamat : '-'
            ]);

            $penduduk->forceFill([
                'keluarga_id' => $keluarga->id
            ])->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('site.keluarga.index')->with('error', __('Whoops! Something went wrong.'));
        }
        return redirect()->route('site.keluarga.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Keluarga $keluarga)
    {
        $pageConfigs = ['pageHeader' => false];
        $penduduk = Penduduk::where('keluarga_id', $keluarga->id)->where('attr_hubungan_id', 1)->first();
        $keluarga->load(['penduduks' => function($query){
            $query->orderBy('attr_hubungan_id', 'asc');
        }]);
        return view('desa.keluarga.show', compact(
            'pageConfigs',
            'keluarga',
            'penduduk'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluarga $keluarga)
    {
        return view('desa.keluarga.edit',compact('keluarga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeluargaRequest  $request
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeluargaRequest $request, Keluarga $keluarga)
    {
        $keluarga->update($request->validated());
        return redirect()->route('site.keluarga.index')->with('success', __('Data Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluarga $keluarga)
    {
        try {
            $keluarga->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'msg' => __('Whoops! Something went wrong.'),
            ]);
        }
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!'),
        ]);
        
    }

    public function kartu(Keluarga $keluarga)
    {
        $pageConfigs = ['pageHeader' => false];
        $penduduk = Penduduk::where('keluarga_id', $keluarga->id)->where('attr_hubungan_id', 1)->first();
        $keluarga->load(['penduduks' => function ($query) {
            $query->orderBy('attr_hubungan_id', 'asc');
        }]);
        return view('desa.keluarga.kartu', compact(
            'pageConfigs',
            'keluarga',
            'penduduk'
        ));
    }
    public function print(Keluarga $keluarga)
    {
        $pageConfigs = ['pageHeader' => false];
        $penduduk = Penduduk::where('keluarga_id', $keluarga->id)->where('attr_hubungan_id', 1)->first();
        $keluarga->load(['penduduks' => function ($query) {
            $query->orderBy('attr_hubungan_id', 'asc');
        }]);
        return view('desa.keluarga.print', compact(
            'pageConfigs',
            'keluarga',
            'penduduk'
        ));
    }

}