@extends('layouts/fullLayoutMaster')

@section('title', 'Print Laporan')

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
                <h2 style="color: black">KARTU INVENTARIS BARANG (KIB)</h2>
                <h2 style="color: black">ASET TETAP - {{ $title }}</h2>
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
                {{-- <div class="col-lg-4  mt-xl-0 mt-2">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 150px">KECAMATAN</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_kecamatan', 'Monterado')) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px">KABUPATEN</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_kabupaten', 'Bengkayang')) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px">KODE POS</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('kode_pos', '79082')) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px">PROVINSI</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_provinsi', 'Kalimantan Barat')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Small Table start -->
    <div class="row" id="table-small">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead style="color: black">
                        <tr class="text-center">
                            <th rowspan="2">No.</th>
                            <th rowspan="2">NAMA</th>
                            <th colspan="2">NOMOR</th>
                            <th rowspan="2">JENIS ASET</th>
                            <th colspan="2">BUKU</th>
                            <th colspan="2">KESENIAN</th>
                            <th colspan="2">HEWAN TERNAK</th>
                            <th colspan="2">TUMBUHAN</th>
                            <th rowspan="2">TAHUN</th>
                            <th rowspan="2">JUMLAH</th>
                            <th rowspan="2">ASAL</th>
                            <th rowspan="2">HARGA</th>
                            <th rowspan="2">KET</th>
                        </tr>
                        <tr class="text-center">
                            {{-- nomor --}}
                            <th>KODE</th>
                            <th>NO REGISTRASI</th>
                            <th>JUDUL</th>
                            <th>SPESIFIKASI</th>
                            <th>ASAL DAERAH</th>
                            <th>PENCIPTA</th>
                            <th>JENIS</th>
                            <th>UKURAN</th>
                            <th>JENIS</th>
                            <th>UKURAN</th>
                        </tr>
                    </thead>
                    <tbody style="color: black">
                    @foreach ($inventarisAssetTetap as $item)                 
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->no_register }}</td>
                        <td>{{ $item->invJenisAsset->nama }}</td>
                        <td>{{ $item->judul_buku }}</td>
                        <td>{{ $item->spesifikasi_buku }}</td>
                        <td>{{ $item->asal_daerah }}</td>
                        <td>{{ $item->pencipta }}</td>
                        <td>{{ $item->jenis_hewan }}</td>
                        <td>{{ $item->ukuran_hewan }}</td>
                        <td>{{ $item->jenis_tumbuhan }}</td>
                        <td>{{ $item->ukuran_tumbuhan }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->invAsal->nama }}</td>
                        <td>{{ $item->formatRupiah('harga') }}</td>
                        <td>{{ $item->ket }}</td>
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
