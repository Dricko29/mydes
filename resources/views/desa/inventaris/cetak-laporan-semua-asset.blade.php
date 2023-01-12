@extends('layouts/fullLayoutMaster')

@section('title', 'Print Laporan Inventaris Peralatan')

@section('page-style')
<style>
.table thead th, .table tfoot th {
    vertical-align: middle;
    text-transform: uppercase;
    font-size: 0.857rem;
    letter-spacing: 0.5px;
}
.table tbody td{
        vertical-align: middle;
    text-transform: uppercase;
    font-size: 0.857rem;
    letter-spacing: 0.5px;
}
</style>

@endsection

@section('content')
<div class="p-3">
    <div class="row" id="basic-table">
        <div class="col-12">
        <!-- Address and Contact starts -->
            <div align="center">
                <h2 style="color: black">BUKU INVENTARIS DAN KEKAYAAN DESA</h2>
                <h2 style="color: black">{{ $title }}</h2>
            </div>
            <div class="row mt-4 mb-2">
                <div class="col-lg-4  mt-xl-0 mt-2">
                    <table>
                        <tbody style="color: black">
                            <tr>
                                <td style="width: 150px">DESA</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_desa', '')) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px">KECAMATAN</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_kecamatan', '')) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px">KABUPATEN</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_kabupaten', '')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Small Table start -->
    <div class="row" id="table-small">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead style="color: black">
                        <tr>
                        <th scope="col" class="text-nowrap text-center">No</th>
                        <th scope="col" class="text-nowrap">Asal Barang</th>
                        <th scope="col" class="text-nowrap text-center">Konstruksi Berjalan</th>
                        <th scope="col" class="text-nowrap text-center">Tanah</th>
                        <th scope="col" class="text-nowrap text-center">Aset Tetap</th>
                        <th scope="col" class="text-nowrap text-center">Bangunan</th>
                        <th scope="col" class="text-nowrap text-center">Peralatan</th>
                        </tr>
                    </thead>
                    <tbody style="color: black">
                        @foreach ($assets as $item)         
                        <tr>
                            <td class="text-nowrap text-center">{{ $loop->iteration }}</td>
                            <td class="text-nowrap">{{ $item->nama }}</td>
                            <td class="text-nowrap text-center">{{ $item->inventaris_konstruksi_berjalans_count }}</td>
                            <td class="text-nowrap text-center">{{ $item->inventaris_tanahs_count }}</td>
                            <td class="text-nowrap text-center">{{ $item->inventaris_asset_tetaps_count }}</td>
                            <td class="text-nowrap text-center">{{ $item->inventaris_bangunans_count }}</td>
                            <td class="text-nowrap text-center">{{ $item->inventaris_peralatans_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Small Table end -->
    <div class="row mt-2">
        <div class="col-6 text-center">
            <span style="color: black">MENGETAHUI,</span>
            <h5 style="color: black">KEPALA SKPD</h5>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h5 style="color: black">(......................................)</h5>
            <h5 style="color: black">NIP.........................</h5>
        </div>
        <div class="col-6 text-center">
            <span style="color: black">
                {{ settings()->group('desa')->get('nama_desa') }}, {{ \Carbon\Carbon::now()->locale('id_ID')->isoFormat('LL'); }}
            </span>
            <h5 style="color: black">{{ Str::upper($ttd->jabatan->nama) }} {{ Str::upper(settings()->group('desa')->get('nama_desa', 'goa boma')) }}</h5>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h5 style="color: black">( {{ Str::upper($ttd->nama) }} )</h5>
        </div>
    </div>
</div>
@endsection

@section('page-script')
{{-- <script src="{{asset('js/scripts/pages/app-invoice-print.js')}}"></script> --}}
<script>
    $(function () {
  'use strict';

  window.print();
});
</script>
@endsection
