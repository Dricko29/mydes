<?php

namespace App\Http\Controllers\Desa;

use App\Models\Dusun;
use App\Models\AttrSuku;
use App\Models\Penduduk;
use App\Models\AttrAgama;
use App\Models\AttrBahasa;
use App\Models\AttrStatus;
use App\Models\AttrKelamin;
use App\Models\AttrHubungan;
use App\Models\AttrPekerjaan;
use App\Models\AttrPendidikan;
use App\Models\AttrStatusDasar;
use App\Models\AttrStatusKawin;
use App\Models\AttrWarganegara;
use App\Models\AttrGolonganDarah;
use App\Models\AttrHubunganKeluarga;
use App\Models\AttrPendidikanKeluarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Penduduk::with([
                'keluarga',
                'attrKelamin',
                'attrAgama',
                'attrSuku',
                'attrBahasa',
                'attrWarganegara',
                'attrPekerjaan',
                'attrGolonganDarah',
                'attrHubungan',
                'attrHubunganKeluarga',
                'attrStatus',
                'attrStatusDasar',
                'attrStatusKawin',
                'attrPendidikan',
                'attrPendidikanKeluarga',
                'dusun',
                'rukunWarga',
                'rukunTetangga'
            ])->latest();
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('keluarga.no_keluarga', function($model){
                    if ($model->keluarga) {
                        return $model->keluarga->no_keluarga;
                    } else {
                        return "-";
                    }
                    
                })
                ->make(true);
        }
        return view('desa.penduduk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agama = AttrAgama::all();
        $pendidikan = AttrPendidikan::all();
        $pendidikanKK = AttrPendidikanKeluarga::all();
        $kelamin = AttrKelamin::all();
        $bahasa = AttrBahasa::all();
        $suku = AttrSuku::all();
        $status = AttrStatus::all();
        $statusDasar = AttrStatusDasar::all();
        $statusKawin = AttrStatusKawin::all();
        $hubungan = AttrHubungan::all();
        $hubunganKK = AttrHubunganKeluarga::all();
        $pekerjaan = AttrPekerjaan::all();
        $warganegara = AttrWarganegara::all();
        $dusun = Dusun::all();
        $golonganDarah = AttrGolonganDarah::all();

        return view('desa.penduduk.create', compact(
            'agama',
            'pendidikan',
            'pendidikanKK',
            'kelamin',
            'bahasa',
            'suku',
            'status',
            'statusDasar',
            'statusKawin',
            'hubungan',
            'hubunganKK',
            'pekerjaan',
            'warganegara',
            'dusun',
            'golonganDarah'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendudukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendudukRequest $request)
    {
        $data = Penduduk::create($request->validated());
        if ($request->file('foto')) {
            // jika ada upload foto baru
            $path = $request->file('foto')->store('desa/penduduk/foto');
            $data->forceFill([
                'foto' => $path
            ])->save();
        }
        return redirect()->route('site.penduduk.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        return view('desa.penduduk.show', compact(
            'penduduk'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        $agama = AttrAgama::all();
        $pendidikan = AttrPendidikan::all();
        $pendidikanKK = AttrPendidikanKeluarga::all();
        $kelamin = AttrKelamin::all();
        $bahasa = AttrBahasa::all();
        $suku = AttrSuku::all();
        $status = AttrStatus::all();
        $statusDasar = AttrStatusDasar::all();
        $statusKawin = AttrStatusKawin::all();
        $hubungan = AttrHubungan::all();
        $hubunganKK = AttrHubunganKeluarga::all();
        $pekerjaan = AttrPekerjaan::all();
        $warganegara = AttrWarganegara::all();
        $dusun = Dusun::all();
        $golonganDarah = AttrGolonganDarah::all();

        return view('desa.penduduk.edit', compact(
            'agama',
            'pendidikan',
            'pendidikanKK',
            'kelamin',
            'bahasa',
            'suku',
            'status',
            'statusDasar',
            'statusKawin',
            'hubungan',
            'hubunganKK',
            'pekerjaan',
            'warganegara',
            'dusun',
            'golonganDarah',
            'penduduk'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendudukRequest  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendudukRequest $request, Penduduk $penduduk)
    {
        $penduduk->update($request->validated());
        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $path = $request->file('foto')->store('desa/penduduk/foto');
            $penduduk->forceFill([
                'foto' => $path
            ])->save();
        }
        return redirect()->route('site.penduduk.index')->with('success', __('Data Changed Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        if ($penduduk->foto) {
            Storage::delete($penduduk->foto);
        }
        $penduduk->delete();
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!'),
        ]);
    }

    public function biodata(Penduduk $penduduk)
    {
        $pageConfigs = ['pageHeader' => false];
        return view('desa.penduduk.biodata', compact(
            'pageConfigs',
            'penduduk'
        ));
    }
    public function print(Penduduk $penduduk)
    {
        $pageConfigs = ['pageHeader' => false];
        return view('desa.penduduk.print', compact(
            'pageConfigs',
            'penduduk'
        ));
    }
}