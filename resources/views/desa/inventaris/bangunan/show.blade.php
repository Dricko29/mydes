
@extends('layouts/contentLayoutMaster')

@section('title', 'Rincian Inventaris Gedung Dan Bangunan')

@section('content')

<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-2">Detail Inventaris Gedung Dan Bangunan | {{ $inventarisBangunan->nama }}</h4>
        <a href="{{ route('site.inventarisBangunan.index') }}" class="btn btn-primary btn-sm">
            <i data-feather="arrow-left" class="me-25"></i>
            <span>Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <a href="{{ route('site.inventarisBangunan.print', $inventarisBangunan->id) }}" target="blank" class="btn btn-info btn-sm" title="print detail inventaris tanah">
            <i data-feather="printer" class="me-25"></i>
            <span>Print</span>
        </a>
      </div>
      <div class="table-responsive">
        <table class="table">
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
</div>
@endsection
