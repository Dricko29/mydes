<?php

namespace App\Http\Controllers\Keluarga;

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
use App\Http\Controllers\Controller;
use App\Models\AttrHubunganKeluarga;
use Illuminate\Support\Facades\Gate;
use App\Models\AttrPendidikanKeluarga;

class CreatePendudukMasukController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        abort_if(!Gate::allows('create keluarga'), 403);
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

        return view('desa.keluarga.form_pendudukmasuk', compact(
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
}