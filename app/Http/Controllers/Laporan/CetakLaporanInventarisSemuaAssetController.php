<?php

namespace App\Http\Controllers\Laporan;

use App\Models\InvAsal;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisAssetTetap;
use Database\Seeders\InvAsalSeeder;
use Illuminate\Database\Eloquent\Builder;

class CetakLaporanInventarisSemuaAssetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tahun = $request->tahun;
        $ttd = Pegawai::find($request->pegawai_id);
        
        if($tahun == '')
        {
            $assets = InvAsal::withCount(['inventarisKonstruksiBerjalans', 'inventarisTanahs', 'inventarisAssetTetaps', 'inventarisBangunans', 'inventarisPeralatans'])->get();
            $title = 'SEMUA TAHUN';
        }else{
            $assets = InvAsal::withCount([
                'inventarisKonstruksiBerjalans'=> function($query) use($tahun){
                $query->whereYear('tanggal_mulai', $tahun);
            },  
                'inventarisTanahs' => function ($query) use ($tahun) {
                $query->where('tahun', $tahun);
            },
                'inventarisAssetTetaps' => function ($query) use ($tahun) {
                $query->where('tahun', $tahun);
            },
                'inventarisBangunans' => function ($query) use ($tahun) {
                $query->where('tahun', $tahun);
            },
                'inventarisPeralatans' => function ($query) use ($tahun) {
                $query->where('tahun', $tahun);
            },
            ])->get();

            $title = 'TAHUN '.$tahun;
            
        }
        return view('desa.inventaris.cetak-laporan-semua-asset', compact('assets', 'ttd', 'title'));
    }
}