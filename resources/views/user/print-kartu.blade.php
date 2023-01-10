@extends('layouts/fullLayoutMaster')

@section('title', 'Print Kartu Keluarga')

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
                <h4>SALINAN</h4>
                <h2 style="font-weight: 800">KARTU KELUARGA</h2>
                <h4 style="font-weight: 800">No. {{ $keluarga->no_keluarga }} </h4>
            </div>
            <div class="row mt-4 mb-2">
                <div class="col-lg-8  mt-xl-0 mt-2">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 220px">NAMA KEPALA KELUARGA</td>
                                <td style="width: 20px">:</td>
                                <td style="font-weight: 600">{{ Str::upper($penduduk->nama) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 220px">ALAMAT</td>
                                <td style="width: 20px">:</td>
                                <td>{{ $keluarga->alamat ? $keluarga->alamat.',' : '' }}{{ Str::upper($penduduk->dusun->nama_dusun) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 220px">RW / RT</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper($penduduk->rukunWarga->nama_rw) }} / {{ Str::upper($penduduk->rukunTetangga->nama_rt) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 220px">DESA</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_desa', 'Goa Boma')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4  mt-xl-0 mt-2">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 150px">KECAMATAN</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_kecamatan', 'Monterado')) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px">KABUPATEN</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_kabupaten', 'Bengkayang')) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px">KODE POS</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('kode_pos', '79082')) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px">PROVINSI</td>
                                <td style="width: 20px">:</td>
                                <td>{{ Str::upper(settings()->group('desa')->get('nama_provinsi', 'Kalimantan Barat')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Small Table start -->
    <div class="row" id="table-small">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 10px">No.</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Jenis Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($keluarga->penduduks as $item)                 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->attrKelamin->nama }}</td>
                        <td>{{ $item->tempat_lahir }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td>{{ $item->attrAgama->nama }}</td>
                        <td>{{ $item->attrPendidikanKeluarga->nama }}</td>
                        <td>{{ $item->attrPekerjaan->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="row" id="table-small">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th rowspan="2" style="width: 10px">No.</th>
                            <th rowspan="2">Status Perkawinan</th>
                            <th rowspan="2">Status Hubungan Dalam Keluarga</th>
                            <th rowspan="2">Kewarganegaraan</th>
                            <th colspan="2">Dokumen Imigrasi</th>
                            <th colspan="2">Nama Orang Tua</th>
                        </tr>
                        <tr class="text-center">
                            <th>No. Paspor</th>
                            <th>No. Kitas/Kitap</th>
                            <th>Ayah</th>
                            <th>Ibu</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($keluarga->penduduks as $item)                 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->attrStatusKawin->nama }}</td>
                        <td>{{ $item->attrHubungan->nama }}</td>
                        <td>{{ $item->attrWarganegara->nama }}</td>
                        <td>{{ $item->paspor }}</td>
                        <td>{{ $item->kitas }}</td>
                        <td>{{ $item->nama_ayah }}</td>
                        <td>{{ $item->nama_ibu }}</td>
                    </tr>
                    @endforeach
                </tbody>

                </table>
            </div>
        </div>
    </div>
    <!-- Small Table end -->
    <div class="row mt-2">
        <div class="col-6 text-center">
            <span> </span>
            <br>
            <h5 style="color: black">KEPALA KELUARGA</h5>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h5 style="color: black">{{ Str::upper($penduduk->nama) }}</h5>
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
