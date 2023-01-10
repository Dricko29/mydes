
@extends('layouts/contentLayoutMaster')

@section('title', 'Rincian Pembangunan')

@section('content')

<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Detail Pembangunan</h4>
        <a href="{{ route('site.pembangunan.index') }}" class="btn btn-primary btn-sm">
            <i data-feather="arrow-left" class="me-25"></i>
            <span>Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <a href="{{ route('site.pembangunan.print', $pembangunan->id) }}" target="blank" class="btn btn-info btn-sm" title="print detail pembangunan">
            <i data-feather="printer" class="me-25"></i>
            <span>Print</span>
        </a>
        <a href="{{ route('site.dokumentasi.pembangunan', $pembangunan->id) }}" class="btn btn-success btn-sm" title="dokumentasi">
          <i data-feather="image" class="me-25"></i>
          <span>Dokomentasi</span>
        </a>
        {{-- <p class="card-text">
          Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables look in Bootstrap. You
          can use any example of below table for your table and it can be use with any type of bootstrap tables.
        </p> --}}
      </div>
      <div class="table-responsive">
        <table class="table">
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
              <td>{{ $pembangunan->formatRupiah('anggaran') }}</td>
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
                  <div class="progress progress-bar-success">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      aria-valuenow="{{ $progres }}"
                      aria-valuemin="0"
                      aria-valuemax="100"
                      style="width: {{ $progres }}%"
                    >
                      {{ $progres }}%
                    </div>
                  </div>
              </td>
              @else
                  <td>0%</td>
              @endif
            </tr>
        </table>
      </div>

      <hr>
      <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rincian Sumber Pembiayaan</h4>
            </div>
            <div class="table-responsive">
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
        </div>
        </div>
    </div>
  </div>
</div>
@endsection
