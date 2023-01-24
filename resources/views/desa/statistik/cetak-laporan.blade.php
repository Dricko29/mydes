@extends('layouts/fullLayoutMaster')

@section('title', 'Print Laporan Statistik Penduduk')

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
                <div class="mb-2">
                    <img src="{{ Storage::disk('public')->url(settings()->group('umum')->get('app_logo', 'images/logo/logo.png')) }}" alt="">
                </div>
                <h2 style="font-weight: 800">LAPORAN DATA STATISTIK PENDUDUK TAHUN {{ $tahun }}</h2>
                <h5>Kec. {{ settings()->group('desa')->get('nama_kecamatan') }}, Kab. {{ settings()->group('desa')->get('nama_kabupaten') }}, Desa {{ settings()->group('desa')->get('nama_desa') }}</h5>
            </div>
            <div class="row mt-4 mb-2">
                <div class="col-lg-8  mt-xl-0 mt-2">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 220px">Nomor Laporan</td>
                                <td style="width: 20px">:</td>
                                <td style="font-weight: 600">{{ Str::upper($no_laporan) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 220px">Tanggal</td>
                                <td style="width: 20px">:</td>
                                <td>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Small Table start -->
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          <thead>
            <tr>
              <th scope="col" class="text-nowrap">No</th>
              <th scope="col" class="text-nowrap">Peristiwa</th>
              <th scope="col" class="text-nowrap text-center">Total</th>
              <th scope="col" class="text-nowrap text-center">Laki Laki</th>
              <th scope="col" class="text-nowrap text-center">Perempuan</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td class="text-nowrap">1</td>
                <td class="text-nowrap">Penduduk Pindah</td>
                <td class="text-nowrap">{{ $pendudukPindah[0]['total'] }}</td>
                <td class="text-nowrap">{{ $pendudukPindah[0]['laki'] }}</td>
                <td class="text-nowrap">{{ $pendudukPindah[0]['perempuan'] }}</td>
              </tr>
              <tr>
                <td class="text-nowrap">2</td>
                <td class="text-nowrap">Penduduk Masuk</td>
                <td class="text-nowrap">{{ $pendudukMasuk[0]['total'] }}</td>
                <td class="text-nowrap">{{ $pendudukMasuk[0]['laki'] }}</td>
                <td class="text-nowrap">{{ $pendudukMasuk[0]['perempuan'] }}</td>
              </tr>
              <tr>
                <td class="text-nowrap">3</td>
                <td class="text-nowrap">Penduduk Lahir</td>
                <td class="text-nowrap">{{ $pendudukLahir[0]['total'] }}</td>
                <td class="text-nowrap">{{ $pendudukLahir[0]['laki'] }}</td>
                <td class="text-nowrap">{{ $pendudukLahir[0]['perempuan'] }}</td>
              </tr>
              <tr>
                <td class="text-nowrap">4</td>
                <td class="text-nowrap">Penduduk Meninggal</td>
                <td class="text-nowrap">{{ $pendudukMati[0]['total'] }}</td>
                <td class="text-nowrap">{{ $pendudukMati[0]['laki'] }}</td>
                <td class="text-nowrap">{{ $pendudukMati[0]['perempuan'] }}</td>
              </tr>
          </tbody>
        </table>
      </div>
    <div class="row mt-2">
        <div class="col-6 text-center">
            <span> </span>
            <br>
            <h5 style="color: black"></h5>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h5 style="color: black"></h5>
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
