@extends('layouts/contentLayoutMaster')

@section('title', 'Rincian Inventaris Asset Tetap')

@section('content')

<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-2">Detail {{ $inventarisAssetTetap->nama }}</h4>
        <a href="{{ route('site.inventarisAssetTetap.index') }}" class="btn btn-primary btn-sm">
            <i data-feather="arrow-left" class="me-25"></i>
            <span>Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <a href="{{ route('site.inventarisAssetTetap.print', $inventarisAssetTetap->id) }}" target="blank" class="btn btn-info btn-sm" title="print detail inventaris tanah">
            <i data-feather="printer" class="me-25"></i>
            <span>Print</span>
        </a>
      </div>
      <div class="table-responsive">
        <table class="table">
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
</div>
@endsection
