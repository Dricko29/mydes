
@extends('layouts/contentLayoutMaster')

@section('title', 'Rincian Inventaris Peralatan Dan Mesin')

@section('content')

<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-2">Detail {{ $inventarisPeralatan->nama }}</h4>
        <a href="{{ route('site.inventarisPeralatan.index') }}" class="btn btn-primary btn-sm">
            <i data-feather="arrow-left" class="me-25"></i>
            <span>@lang('Back')</span>
        </a>
    </div>
    <div class="card-body">
        <a href="{{ route('site.inventarisPeralatan.print', $inventarisPeralatan) }}" target="blank" class="btn btn-info btn-sm" title="print detail inventaris tanah">
            <i data-feather="printer" class="me-25"></i>
            <span>@lang('Print')</span>
        </a>
      </div>
      <div class="table-responsive">
        <table class="table">
            <tr>
              <th style="width: 250px">Kategori</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisPeralatan->invKategoriPeralatan->kode }} ( {{ $inventarisPeralatan->invKategoriPeralatan->nama }} )</td>
            </tr>
            <tr>
              <th style="width: 250px">Nama</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisPeralatan->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Kode</th>
              <td style="width: 20px">:</td>
              <td>{{ $inventarisPeralatan->kode }}</td>
            </tr>
            <tr>
              <th style="width: 250px">No Register</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->no_register}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Merk/Type</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->merk}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Ukuran</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->ukuran}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Bahan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->bahan}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Nomor Pabrik</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->no_pabrik}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Nomor Mesin</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->no_mesin}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Nomor Rangka</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->no_rangka}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Nomor Polisi</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->no_polisi}}</td>
            </tr>
            <tr>
              <th style="width: 250px">BPKB</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->bpkb}}</td>
            </tr>
            <tr>
              <th style="width: 250px">Tahun Pengadaan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->tahun }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Pengguna Barang</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->invPenggunaBarang->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Asal / Usul</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->invAsal->nama }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Harga</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->formatRupiah('harga') }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Keterangan</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->keterangan }}</td>
            </tr>
            <tr>
              <th style="width: 250px">Status</th>
              <td style="width: 50px">:</td>
              <td>{{ $inventarisPeralatan->status ? 'Aktif' : 'Nonaktif' }}</td>
            </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
