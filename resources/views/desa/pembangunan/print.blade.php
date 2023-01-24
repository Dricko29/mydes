
@extends('layouts/fullLayoutMaster')

@section('title', 'Rincian Pembangunan')

@section('content')

<div class="row p-4" id="basic-table">
  <div class="col-12">
    <div align="center">
        <div class="mb-2">

            <img src="{{ Storage::disk('public')->url(settings()->group('umum')->get('app_logo', 'images/logo/logo.png')) }}" alt="">
        </div>
        <h2 style="font-weight: 800">Detail Pembangunan</h2>
        <h5>Kec. {{ settings()->group('desa')->get('nama_kecamatan') }}, Kab. {{ settings()->group('desa')->get('nama_kabupaten') }}, Desa {{ settings()->group('desa')->get('nama_desa') }}</h5>
    </div>
    <hr>
    <table class="mt-4">
        <tr>
          <th style="width: 250px">Nama Pembangunan</th>
          <td style="width: 20px">:</td>
          <td>{{ $pembangunan->nama }}</td>
        </tr>
        <tr>
          <th style="width: 250px">Tahun Anggaran</th>
          <td style="width: 20px">:</td>
          <td>{{ $pembangunan->tahun_anggaran }}</td>
        </tr>
        <tr>
          <th style="width: 250px">Sumber Dana</th>
          <td style="width: 50px">:</td>
          <td>{{ $pembangunan->sumberDana->nama }}</td>
        </tr>
        <tr>
          <th style="width: 250px">Total Anggaran</th>
          <td style="width: 50px">:</td>
          <td>{{ $pembangunan->formatRupiah('anggaran')}}</td>
        </tr>
        <tr>
          <th style="width: 250px">Lokasi</th>
          <td style="width: 50px">:</td>
          <td>{{ $pembangunan->lokasi }}</td>
        </tr>
        <tr>
          <th style="width: 250px">Volume</th>
          <td style="width: 50px">:</td>
          <td>{{ $pembangunan->volume }}</td>
        </tr>
        <tr>
          <th style="width: 250px">Sifat Pembangunan</th>
          <td style="width: 50px">:</td>
          <td>{{ $pembangunan->sifat == 1 ? 'Baru' : 'Lanjut' }}</td>
        </tr>
        <tr>
          <th style="width: 250px">Pelaksana</th>
          <td style="width: 50px">:</td>
          <td>{{ $pembangunan->pelaksana }}</td>
        </tr>
        <tr>
          <th style="width: 250px">Progres Pembangunan</th>
          <td style="width: 50px">:</td>
          @if ($progres)   
          <td>
            {{ $progres }}%
          </td>
          @else
              <td>0%</td>
          @endif
        </tr>
    </table>
    <hr>
    <div class="col-12">
        <h4 class="card-title">Rincian Sumber Pembiayaan</h4>
        <div class="table-responsive table-bordered">
            <table class="table">
            <thead>
                <tr>
                <th>Pemerintah</th>
                <th>Provinsi</th>
                <th>Kabupaten/Kota</th>
                <th>Swadaya</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $pembangunan->formatRupiah('sb_pemerintah') }}</td>
                    <td>{{ $pembangunan->formatRupiah('sb_provinsi') }}</td>
                    <td>{{ $pembangunan->formatRupiah('sb_kab_kot') }}</td>
                    <td>{{ $pembangunan->formatRupiah('sb_swadaya') }}</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
    <div class="col-12">
          <div class="row mt-4">
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
            <h5 style="color: black">KEPALA DESA {{ Str::upper(settings()->group('desa')->get('nama_desa', 'goa boma')) }}</h5>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h5 style="color: black">{{ Str::upper(settings()->group('desa')->get('nama_kapala_desa')) }}</h5>
        </div>
    </div>
    </div>
  </div>
</div>
@endsection

@section('page-script')
<script>
$(function () {
  'use strict';

  window.print();
});
</script>
@endsection
