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
                <h2 style="font-weight: 800">LAPORAN DATA STATISTIK KEPENDUDUKAN MENURUT JENIS KELAMIN</h2>
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
              <th scope="col" class="text-nowrap">Jenis Kelamin</th>
              <th scope="col" class="text-nowrap text-center" colspan="2">Total</th>
              <th scope="col" class="text-nowrap text-center" colspan="2">Penduduk Laki Laki</th>
              <th scope="col" class="text-nowrap text-center" colspan="2">Penduduk Perempuan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kelamin as $item)           
            <tr>
              <td class="text-nowrap">{{ $loop->iteration }}</td>
              <td class="text-nowrap">{{ $item->nama }}</td>
              <td class="text-nowrap">{{ $item->penduduk_count }}</td>
              @if ($item->penduduk_count !=0)
                  
              <td class="text-nowrap">{{ number_format((($item->penduduk_count/$pendudukTotal) * 100), 2) }}%</td>
              @else
                <td>0%</td>
              @endif
              <td class="text-nowrap">{{ $item->laki }}</td>
              @if ($item->laki !=0)
                  
              <td class="text-nowrap">{{ number_format((($item->laki/$item->penduduk_count) * 100), 2) }}%</td>
              @else
                <td>0%</td>
              @endif
              <td class="text-nowrap">{{ $item->perempuan }}</td>
                @if ($item->laki !=0)
                  
                <td class="text-nowrap">{{ number_format((($item->perempuan/$item->penduduk_count) * 100), 2) }}%</td>
                @else
                <td>0%</td>
                @endif
            </tr>
            @endforeach
            <tr>
              <td colspan="2">Total</td>
              <td>{{ $kelamin->sum('penduduk_count')}}</td>
              <td>{{ number_format(($kelamin->sum('penduduk_count')/$pendudukTotal)*100),2}}%</td>
              <td>{{ $kelamin->sum('laki')}}</td>
              <td>{{ number_format(($kelamin->sum('laki')/$pendudukTotal)*100),2}}%</td>
              <td>{{ $kelamin->sum('perempuan')}}</td>
              <td>{{ number_format(($kelamin->sum('perempuan')/$pendudukTotal)*100),2}}%</td>
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
