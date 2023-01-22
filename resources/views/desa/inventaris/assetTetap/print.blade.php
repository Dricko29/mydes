
@extends('layouts/fullLayoutMaster')

@section('title', 'Rincian Inventaris Bangunan')

@section('content')
<div class="row" id="basic-table">
  <div class="col-12">
    <div align="center">
        <div class="mb-2">
            <img src="{{ Storage::disk('public')->url(settings()->group('umum')->get('app_logo', 'images/logo/logo.png')) }}" alt="">
        </div>
        <h2 style="font-weight: 800">DETAIL INVENTARIS ASET TETAP</h2>
        <h5>Kec. {{ settings()->group('desa')->get('nama_kecamatan') }}, Kab. {{ settings()->group('desa')->get('nama_kabupaten') }}, Desa {{ settings()->group('desa')->get('nama_desa') }}</h5>
    </div>
    <div class="table-responsive mt-4">
        <table>
            <tr>
              <th style="width: 250px">Kategori</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisAssetTetap->invKategoriAsset->kode }} ( {{ $inventarisAssetTetap->invKategoriAsset->nama }} )</td>
            </tr>
            <tr>
              <th style="width: 250px">Jenis Asset</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisAssetTetap->invJenisAsset->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Nama</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisAssetTetap->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Kode</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisAssetTetap->kode }}</td>
            </tr>
            <tr>
              <th style="width: 250px">No Register</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisAssetTetap->no_register}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Jumlah</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisAssetTetap->jumlah}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Tahun Pengadaan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisAssetTetap->tahun }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Asal / Usul</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisAssetTetap->invAsal->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Harga</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisAssetTetap->formatRupiah('harga') }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Keterangan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisAssetTetap->keterangan }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Status</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisAssetTetap->status ? 'Aktif' : 'Nonaktif' }}</td>
            </tr>
        </table>
    </div>

  </div>
</div>
<div class="row" id="basic-table">
  <div class="col-12">
          <div class="row mt-4">
              <div class="col-6 text-center">
                  <br>
                  <h5></h5>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <h5 style="font-weight: 800"></h5>
              </div>
              <div class="col-6 text-center">
                  <span>
                      {{ settings()->group('desa')->get('nama_desa') }}, {{ \Carbon\Carbon::now()->locale('id_ID')->isoFormat('LL'); }}
                  </span>
                  <h5>Kepala Desa {{ Str::ucfirst(settings()->group('desa')->get('nama_desa', 'goa boma')) }}</h5>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <h5 style="font-weight: 800">{{ Str::upper(settings()->group('desa')->get('nama_kapala_desa')) }}</h5>
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
