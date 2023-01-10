@extends('layouts/fullLayoutMaster')

@section('title', 'Print Biodata Penduduk')

@section('content')

<div class="p-3">

    <div class="row" id="basic-table">
      <div class="col-12">
          <div class="row">
            <div align="center">
                <div class="mb-2">
                    <img src="{{ asset(settings()->group('umum')->get('app_logo', 'images/logo/logo.png')) }}" alt="">
                </div>
                <h2 style="font-weight: 800">BIODATA PENDUDUK WARGANEGARA</h2>
                <h5>Kec. {{ settings()->group('desa')->get('nama_kecamatan') }}, Kab. {{ settings()->group('desa')->get('nama_kabupaten') }}, Desa {{ settings()->group('desa')->get('nama_desa') }}</h5>
            </div>
            <div class="row mt-4 mb-2">
                <div class="col-8  mt-xl-0 mt-2">
                    <table>
                        <tbody>
                            <div class="row">
                                <th>Data Personal</th>
                                <tr>
                                    <td style="width: 250px">Nama Lengkap</td>
                                    <td style="width: 20px">:</td>
                                    <td style="font-weight: 600">{{ Str::upper($penduduk->nama) }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Nik</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->nik) }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Nomor Keluarga</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->keluarga ? $penduduk->keluarga->no_keluarga : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Tempat Lahir</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->tempat_lahir) }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Tanggal Lahir</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->tanggal_lahir) }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Jenis Kelamin</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrKelamin ? $penduduk->attrKelamin->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Agama</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrAgama ? $penduduk->attrAgama->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Pendidikan Terakhir</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrPendidikanKeluarga ? $penduduk->attrPendidikanKeluarga->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Pekerjaan</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrPekerjaan ? $penduduk->attrPekerjaan->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Status Kawin</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrStatusKawin ? $penduduk->attrStatusKawin->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Hubungan Dalam Keluarga</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrHubungan ? $penduduk->attrHubungan->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Golongan Darah</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrGolonganDarah ? $penduduk->attrGolonganDarah->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Warganegara</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrWarganegara ? $penduduk->attrWarganegara->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Suku / Etnis</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrSuku ? $penduduk->attrSuku->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Nama Ayah</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->nama_ayah ? $penduduk->nama_ayah: '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">NIK Ayah</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->nik_ayah ? $penduduk->nik_ayah: '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Nama Ibu</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->nama_ibu ? $penduduk->nama_ibu: '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">NIK Ibu</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->nik_ibu ? $penduduk->nik_ibu: '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Status Kependudukan</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->attrStatus ? $penduduk->attrStatus->nama : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Nomor Telpon</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->tlp ? $penduduk->tlp: '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Email</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->email ? $penduduk->email: '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Alamat</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ Str::upper($penduduk->alamat ? $penduduk->alamat: '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px"></td>
                                    <td style="width: 20px"></td>
                                    <td>{{ Str::upper($penduduk->rukunWarga ? $penduduk->rukunWarga->nama_rw : '-') }} / {{ Str::upper($penduduk->rukunTetangga ? $penduduk->rukunTetangga->nama_rt : '-') }}, {{ Str::upper($penduduk->dusun ? $penduduk->dusun->nama_dusun : '-') }} </td>
                                </tr>
                            </div>
                            <div class="row mt-2">
                                <th style="font-weight: 600">Data Kepemilikan Dokumen</th>
                                <tr>
                                    <td style="width: 250px">Nomor Paspor</td>
                                    <td style="width: 20px">:</td>
                                    <td style="font-weight: 600">{{ Str::upper($penduduk->paspor ? $penduduk->paspor : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Nomor Kitas / Kitap</td>
                                    <td style="width: 20px">:</td>
                                    <td style="font-weight: 600">{{ Str::upper($penduduk->kitas ? $penduduk->kitas : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Akta Pernikahan</td>
                                    <td style="width: 20px">:</td>
                                    <td style="font-weight: 600">{{ Str::upper($penduduk->no_akta_pernikahan ? $penduduk->no_akta_pernikahan : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Tanggal Pernikahan</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ \Carbon\Carbon::parse($penduduk->tanggal_pernikahan)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Akta Perceraian</td>
                                    <td style="width: 20px">:</td>
                                    <td style="font-weight: 600">{{ Str::upper($penduduk->no_akta_perceraian ? $penduduk->no_akta_perceraian : '-') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Tanggal Perceraian</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ \Carbon\Carbon::parse($penduduk->tanggal_perceraian)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px">Nomor BPJS Kesehatan</td>
                                    <td style="width: 20px">:</td>
                                    <td>{{ $penduduk->no_bpjs }}</td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                </div>
                <div class="col-4  mt-xl-0 mt-2">
                    <table>
                        <tbody>
                            <tr>
                                <img src="{{ asset($penduduk->foto) }}" alt="" height="200px">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          <div class="row" id="basic-table">
            <div class="col-12">
                    <div class="row mt-2">
                        <div class="col-6 text-center">
                            <br>
                            <h5>Yang Bersangkutan</h5>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h5 style="font-weight: 800">{{ Str::upper($penduduk->nama) }}</h5>
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