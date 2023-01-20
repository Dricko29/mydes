<?php

namespace App\Http\Controllers\Keluarga;

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Dusun;
use App\Models\AttrSuku;
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
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreatePendudukMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|petugas|kades']);
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
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