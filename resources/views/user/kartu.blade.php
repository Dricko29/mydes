@extends('layouts/contentLayoutMaster')

@section('title', 'Kartu Keluarga')

@section('content')

<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Kartu Keluarga</h4>
            {{-- <a href="{{ route('site.keluarga.show', $keluarga) }}" class="btn btn-primary btn-sm">
                <i data-feather="arrow-left" class="me-25"></i>
                <span>@lang('Back')</span>
            </a> --}}
        </div>
        <div class="card-body">
            <a href="{{ route('user.keluarga.print') }}" target="blank" class="btn btn-info btn-sm" title="print kartu keluarga">
                <i data-feather="printer" class="me-25"></i>
                <span>@lang('Print')</span>
            </a>
            {{-- <a href="{{ route('keluarga.pdf',$keluarga) }}" target="blank" class="btn btn-info btn-sm" title="download kartu keluarga">
                <i data-feather="list" class="me-25"></i>
                <span>@lang('Download')</span>
            </a>
            <a href="{{ route('keluarga.word',$keluarga) }}" target="blank" class="btn btn-info btn-sm" title="download kartu keluarga">
                <i data-feather="list" class="me-25"></i>
                <span>@lang('Word')</span>
            </a> --}}

            <!-- Address and Contact starts -->
            <div class="card-body pt-2">
                <div class="row">
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
                                        <td style="width: 250px">NAMA KEPALA KELUARGA</td>
                                        <td style="width: 20px">:</td>
                                        <td style="font-weight: 600">{{ Str::upper($penduduk->nama) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 250px">ALAMAT</td>
                                        <td style="width: 20px">:</td>
                                        <td>{{ $keluarga->alamat ? $keluarga->alamat.',' : '' }}{{ Str::upper($penduduk->dusun->nama_dusun) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 250px">RW / RT</td>
                                        <td style="width: 20px">:</td>
                                        <td>{{ Str::upper($penduduk->rukunWarga->nama_rw) }} / {{ Str::upper($penduduk->rukunTetangga->nama_rt) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 250px">DESA</td>
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
            <!-- Address and Contact ends -->
            <div class="row" id="basic-table">
              <div class="col-12">
                  <div class="card">
                    <!-- Small Table start -->
                    <div class="row mb-4" id="table-small">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Agama</th>
                                            <th>Pendidikan</th>
                                            <th>Jenis Pekerjaan</th>
                                            <th>Golongan Darah</th>
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
                                        <td>{{ $item->attrGolonganDarah->nama }}</td>
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
                                            <th rowspan="2">No.</th>
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
                            <br>
                            <h5>KEPALA KELUARGA</h5>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h5>{{ Str::upper($penduduk->nama) }}</h5>
                        </div>
                        <div class="col-6 text-center">
                            <span>
                                {{ settings()->group('desa')->get('nama_desa') }}, {{ \Carbon\Carbon::now()->locale('id_ID')->isoFormat('LL'); }}
                            </span>
                            <h5>KEPALA DESA {{ Str::upper(settings()->group('desa')->get('nama_desa', 'goa boma')) }}</h5>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h5>{{ Str::upper(settings()->group('desa')->get('nama_kapala_desa')) }}</h5>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
   
    </div>
  </div>
</div>
@endsection