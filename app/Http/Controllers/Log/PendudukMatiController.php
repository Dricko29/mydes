<?php

namespace App\Http\Controllers\Log;

use App\Models\Dusun;
use App\Models\AttrSuku;
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
use App\Http\Requests\StorePendudukRequest;
use App\Models\Penduduk;

class PendudukMatiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Penduduk $penduduk)
    {
        abort_if(!Gate::allows('update penduduk'), 403);
        $title = 'mati';
        return view('desa.penduduk.form-log.penduduk-mati', compact(
            'penduduk',
            'title'
        ));
    }
}