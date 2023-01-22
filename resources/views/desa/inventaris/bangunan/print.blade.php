
@extends('layouts/fullLayoutMaster')

@section('title', 'Rincian Inventaris Bangunan')

@section('content')
<div class="row" id="basic-table">
  <div class="col-12">
    <div align="center">
        <div class="mb-2">
            <img src="{{ Storage::disk('public')->url(settings()->group('umum')->get('app_logo', 'images/logo/logo.png')) }}" alt="">
        </div>
        <h2 style="font-weight: 800">DETAIL INVENTARIS BANGUNAN</h2>
        <h5>Kec. {{ settings()->group('desa')->get('nama_kecamatan') }}, Kab. {{ settings()->group('desa')->get('nama_kabupaten') }}, Desa {{ settings()->group('desa')->get('nama_desa') }}</h5>
    </div>
    <div class="table-responsive mt-4">
        <table>
            <tr>
              <th style="width: 250px">Kategori</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisBangunan->invKategoriBangunan->kode }} ({{ $inventarisBangunan->invKategoriBangunan->nama }})</td>
            </tr>
            <tr>
              <th style="width: 250px">Nama</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisBangunan->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Kode</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisBangunan->kode }}</td>
            </tr>
            <tr>
              <th style="width: 250px">No Register</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->no_register}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Kondisi Bangunan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->invKondisiBangunan->nama}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Bertingkat</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->bertingkat}} Lantai</td>
            </tr>
            <tr>
              <th style="width: 250px">Jenis Konstruksi</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->beton ? 'Beton' : 'Bukan Beton'}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Luas Bangunan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->luas_bangunan }} m<sup>2</sup></td>
            </tr>
            <tr>
              <th style="width: 250px">Kode Tanah</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->kode_tanah }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Luas Tanah</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->luas_tanah }} m<sup>2</sup></td>
            </tr>
            <tr>
              <th style="width: 250px">Status Tanah</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->invStatusTanah->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Tahuh Pengadaan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->tahun }}</td>
            </tr>
            <tr>
              <th style="width: 250px">No Bangunan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->no_bangunan }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Tanggal Dokumen Bangunan</th>
              <td style="width: 50px">:</td>
              <td>{{ \Carbon\Carbon::parse($inventarisBangunan->tanggal_dokumen_bangunan)->format('d-m-Y') }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Pengguna Barang</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->invPenggunaBarang->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Asal / Usul</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->invAsal->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Harga</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->formatRupiah('harga') }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Lokasi</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->lokasi }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Keterangan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->keterangan }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Status</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisBangunan->status ? 'Aktif' : 'Nonaktif' }}</td>
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
