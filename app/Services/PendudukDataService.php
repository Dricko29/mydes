<?php

namespace App\Services;

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\AttrAgama;
use App\Models\AttrPekerjaan;
use App\Models\AttrStatusKawin;
use App\Models\AttrPendidikanKeluarga;

class PendudukDataService 
{

    public function getDataPendudukLaki()
    {
        $jmlPendudukLaki =  Penduduk::count('attr_kelamin_id', 1);
        return $jmlPendudukLaki;
    }
    public function getDataPendudukPerempuan()
    {
        $jmlPendudukPerempuan =  Penduduk::count('attr_kelamin_id', 1);
        return $jmlPendudukPerempuan;
    }
    
    public function getDataJumlahPenduduk()
    {
        $jmlPenduduk = Penduduk::count();
        return $jmlPenduduk;
    }
    public function getDataJumlahKeluarga()
    {
        $jmlKeluarga = Keluarga::count();
        return $jmlKeluarga;
    }
    public function getDataPendidikan(){

        // pendidikan
        $pendidikan = collect(AttrPendidikanKeluarga::withCount('penduduk')->get());
        return $pendidikan;
    }
    public function getDataPekerjaan(){
        // pekerjaan
        $pekerjaan = collect(AttrPekerjaan::withCount('penduduk')->get());
        return $pekerjaan;
    }

    public function getDataAgamas($jmlPenduduk)
    {
        // chart donut agama
        $dataAgama = collect();
        $agama = AttrAgama::withCount('penduduk')->orderBy('penduduk_count', 'asc')->get();
        $agamaMax = $agama->where('penduduk_count', $agama->max('penduduk_count'))->first();
        $agamaMaxPersen = number_format((($agamaMax->penduduk_count / $jmlPenduduk) * 100));
        $seriesAgamaPersen = $agama->map(function ($q) use ($jmlPenduduk) {
            return (int) number_format((($q->penduduk_count / $jmlPenduduk) * 100));
        });
        $dataAgama->push(
            ['agama' => $agama],
            ['agamaMax' => $agamaMax],
            ['agamaMaxPersen' => (int)$agamaMaxPersen],
            ['seriesAgamaPersen' => $seriesAgamaPersen],
        );
        $dataAgamas = $dataAgama->collapse();
        return $dataAgamas;
    }

    public function getDataKawins($jmlPenduduk)
    {
        // chart donut status kawin
        $dataKawin = collect();
        $kawin = AttrStatusKawin::withCount('penduduk')->orderBy('penduduk_count', 'asc')->get();
        $kawinMax = $kawin->where('penduduk_count', $kawin->max('penduduk_count'))->first();
        $kawinMaxPersen = number_format((($kawinMax->penduduk_count / $jmlPenduduk) * 100));
        $seriesKawinPersen = $kawin->map(function ($q) use ($jmlPenduduk) {
            return (int) number_format((($q->penduduk_count / $jmlPenduduk) * 100));
        });
        $dataKawin->push(
            ['kawin' => $kawin],
            ['kawinMax' => $kawinMax],
            ['kawinMaxPersen' => (int)$kawinMaxPersen],
            ['seriesKawinPersen' => $seriesKawinPersen],
        );
        $dataKawins = $dataKawin->collapse();
        return $dataKawins;
    }
}