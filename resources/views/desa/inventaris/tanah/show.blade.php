
@extends('layouts/contentLayoutMaster')

@section('title', 'Rincian Inventaris Tanah')

@section('content')

<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-2">Detail Inventaris Tanah | {{ $inventarisTanah->nama }}</h4>
        <a href="{{ route('site.inventarisTanah.index') }}" class="btn btn-primary btn-sm">
            <i data-feather="arrow-left" class="me-25"></i>
            <span>Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <a href="{{ route('site.inventarisTanah.print', $inventarisTanah->id) }}" target="blank" class="btn btn-info btn-sm" title="print detail inventaris tanah">
            <i data-feather="printer" class="me-25"></i>
            <span>Print</span>
        </a>
      </div>
      <div class="table-responsive">
        <table class="table">
            <tr>
              <th style="width: 250px">Kategori</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisTanah->invKategoriTanah->kode }} ({{ $inventarisTanah->invKategoriTanah->nama }})</td>
            </tr>
            <tr>
              <th style="width: 250px">Nama</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisTanah->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Kode</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisTanah->kode }}</td>
            </tr>
            <tr>
              <th style="width: 250px">No Register</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->no_register}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Luas Tanah</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->luas }} m<sup>2</sup></td>
            </tr>
            <tr>
              <th style="width: 250px">Tahun Pengadaan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->tahun }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Hak Tanah</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->invHakTanah->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">No Sertifikat</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->no_sertifikat }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Tanggal Sertifikat</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->tanggal_sertifikat }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Penggunaan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->invPenggunaan->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Pengguna Barang</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->invPenggunaBarang->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Asal / Usul</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->invAsal->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Harga</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->formatRupiah('harga') }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Alamat</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->alamat }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Keterangan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->keterangan }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Status</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisTanah->status ? 'Aktif' : 'Nonaktif' }}</td>
            </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
