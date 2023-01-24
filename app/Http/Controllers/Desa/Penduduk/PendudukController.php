<?php

namespace App\Http\Controllers\Desa\Penduduk;

use App\Models\Dusun;
use App\Models\AttrSuku;
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
use App\Http\Controllers\Controller;
use App\Models\AttrHubunganKeluarga;
use Illuminate\Support\Facades\Gate;
use App\Models\AttrPendidikanKeluarga;
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
        abort_if(!Gate::allows('read penduduk'),403);
        if ($request->ajax()) {
            $status = $request->status;
            $kelamin = $request->kelamin;
            $statusDasar = $request->statusDasar;
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
            ])->when($status, function ($query) use ($status) {
                $query->where('attr_status_id', $status);
            })->when($kelamin, function ($query) use ($kelamin) {
                $query->where('attr_kelamin_id', $kelamin);
            })->when($statusDasar, function ($query) use ($statusDasar) {
                $query->where('attr_status_dasar_id', $statusDasar);
            });
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('keluarga.no_keluarga', function ($model) {
                    if ($model->keluarga) {
                        return $model->keluarga->no_keluarga;
                    } else {
                        return "-";
                    }
                })
                ->make(true);
        }
        $statusPenduduk = AttrStatus::all();
        $kelaminPenduduk = AttrKelamin::all();
        $statusDasarPenduduk = AttrStatusDasar::all();
        return view('desa.penduduk.index', compact(
            'statusPenduduk',
            'kelaminPenduduk',
            'statusDasarPenduduk',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!Gate::allows('create penduduk'), 403);
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
        abort_if(!Gate::allows('create penduduk'), 403);
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
        abort_if(!Gate::allows('read penduduk'), 403);
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
        abort_if(!Gate::allows('update penduduk'), 403);
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
        abort_if(!Gate::allows('update penduduk'), 403);
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
        try {
            abort_if(!Gate::allows('delete penduduk'), 403);
            if ($penduduk->foto) {
                Storage::delete($penduduk->foto);
            }
            $penduduk->delete();
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