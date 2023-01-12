
@extends('layouts/contentLayoutMaster')

@section('title', 'Rincian Inventaris Konstruksi Berjalan')

@section('content')

<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-2">Detail {{ $inventarisKonstruksiBerjalan->nama }}</h4>
        <a href="{{ route('site.inventarisKonstruksiBerjalan.index') }}" class="btn btn-primary btn-sm">
            <i data-feather="arrow-left" class="me-25"></i>
            <span>Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <a href="{{ route('site.inventarisKonstruksiBerjalan.print', $inventarisKonstruksiBerjalan->id) }}" target="blank" class="btn btn-info btn-sm" title="print detail inventaris tanah">
            <i data-feather="printer" class="me-25"></i>
            <span>Print</span>
        </a>
      </div>
      <div class="table-responsive">
        <table class="table">
            <tr>
              <th style="width: 250px">Nama</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Fisik Bangunan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->invFisikBangunan->nama}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Bertingkat</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->bertingkat}} Lantai</td>
            </tr>
            <tr>
              <th style="width: 250px">Jenis Konstruksi</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->beton ? 'Beton' : 'Bukan Beton'}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Luas Bangunan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->luas_bangunan }} m<sup>2</sup></td>
            </tr>
            <tr>
              <th style="width: 250px">Kode Tanah</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->kode_tanah }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Luas Tanah</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->luas_tanah }} m<sup>2</sup></td>
            </tr>
            <tr>
              <th style="width: 250px">Status Tanah</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->invStatusTanah->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">No Bangunan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->no_bangunan }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Tanggal Dokumen Bangunan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->tanggal_dokumen_bangunan }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Tanggal Mulai</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->tanggal_mulai }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Asal / Usul</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->invAsal->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Harga</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->formatRupiah('harga') }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Lokasi</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->lokasi }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Keterangan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->keterangan }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Status</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisKonstruksiBerjalan->status ? 'Aktif' : 'Nonaktif' }}</td>
            </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
