@extends('layouts/contentLayoutMaster')

@section('title', 'Biodata')

@section('content')

<div class="row" id="table-responsive">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">Biodata</h4>
          <a href="{{ route('site.penduduk.index') }}" class="btn btn-primary btn-sm">
              <i data-feather="arrow-left" class="me-25"></i>
              <span>@lang('Back')</span>
          </a>
      </div>
      <div class="card-body">
        <a href="{{ route('site.penduduk.biodata', $penduduk) }}" class="btn btn-warning btn-sm" title="preview biodata">
            <i data-feather="list" class="me-25"></i>
            <span>@lang('Cetak Biodata')</span>
        </a>
        <a href="{{ route('site.akun.penduduk.create', $penduduk) }}" class="btn btn-success btn-sm" title="akun">
            <i data-feather="list" class="me-25"></i>
            <span>@lang('Akun Penduduk')</span>
        </a>
        <hr>

        <!-- Address and Contact starts -->
        <div class="card-body pt-2">
            <div class="row">
                <div class="user-avatar-section">
                  <div class="d-flex align-items-center flex-column">
                    <img
                      class="img-fluid rounded mt-3 mb-2"
                      src="{{ Storage::disk('public')->url($penduduk->foto_url) }}"
                      height="350"
                      width="350"
                      alt="User avatar"
                    />
                  </div>
                </div>
            </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table mb-0">
          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Data Diri</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Nama</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->nama }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">NIK</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->nik }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor Keluarga</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->keluarga ? $penduduk->keluarga->no_keluarga : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor KK Sebelumnya</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->no_keluarga_sebelumnya }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Hubungan Dalam Keluarga</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->attrHubungan ? $penduduk->attrHubungan->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Jenis Kelamin</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->attrKelamin ? $penduduk->attrKelamin->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Agama</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->attrAgama ? $penduduk->attrAgama->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Status</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->attrStatus ? $penduduk->attrStatus->nama : '-' }}</td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Data Kelahiran</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Tempat Lahir</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->tempat_lahir }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Akta Kelahiran</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->no_akta_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tanggal Lahir</td>
              <td>:</td>
              <td class="text-nowrap">{{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tempat Dilahirkan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->tempat_dilahirkan }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Waktu Kelahirkan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->waktu_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Jenis Kelahirkan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->jenis_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Penolong Kelahirkan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->penolong_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Anak Ke</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->anak_ke }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Berat Kelahiran <small>(gram)</small></td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->berat_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Panjang Kelahiran <small>(centimeter)</small></td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->panjang_kelahiran }}</td>
            </tr>
          </tbody>

          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Data Pekerjaan dan Pendidikan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Pendidikan Dalam KK</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->attrPendidikanKeluarga ? $penduduk->attrPendidikanKeluarga->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Pendidikan Sedang Ditempuh</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->attrPendidikan ? $penduduk->attrPendidikan->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Pekerjaan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->attrPekerjaan? $penduduk->attrPekerjaan->nama : '-' }}</td>
            </tr>
          </tbody>

          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Data Kewarganegaraan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Suku</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->attrSuku ? $penduduk->attrSuku->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Warganegara</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->attrWarganegara ? $penduduk->attrWarganegara->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor Paspor</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->no_paspor ? $penduduk->no_paspor : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tanggal Berakhir Paspor</td>
              <td>:</td>
              <td class="text-nowrap">{{ \Carbon\Carbon::parse($penduduk->tanggal_paspor)->format('d-m-Y') }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor Kitas/Kitap</td>
              <td>:</td>
              <td class="text-nowrap">{{ $penduduk->kitas ? $penduduk->kitas : '-' }}</td>
            </tr>
          </tbody>

          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Data Orang Tua</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Nama Ayah</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->nama_ayah ? $penduduk->nama_ayah : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">NIKAyah</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->nik_ayah ? $penduduk->nik_ayah : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Nama Ibu</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->nama_ibu ? $penduduk->nama_ibu : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">NIK Ibu</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->nik_ibu ? $penduduk->nik_ibu : '-' }}</td>
            </tr>
          </tbody>

          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Alamat</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Alamat</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->alamat ? $penduduk->alamat : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Dusun</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->dusun ? $penduduk->dusun->nama_dusun : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">RT/RW</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->rukunWarga->nama_rw }} / {{ $penduduk->rukunTetangga->nama_rt }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Nomor Telepon</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->tlp ? $penduduk->tlp : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Email</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->email ? $penduduk->email : '-' }}</td>
            </tr>
          </tbody>

          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Data Perkawinan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Status Pernikahan</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->attrStatusKawin ? $penduduk->attrStatusKawin->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Akta Pernikahan</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->no_akta_pernikahan }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tanggal Pernikahan</td>
              <td>:</td>
              <td class="text-nowrap">{{ \Carbon\Carbon::parse($penduduk->tanggal_pernikahan)->format('d-m-Y') }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Akta Perceraian</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->no_akta_perceraian }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tanggal Perceraian</td>
              <td>:</td>
              <td class="text-nowrap">{{ \Carbon\Carbon::parse($penduduk->tanggal_perceraian)->format('d-m-Y') }}</td>
            </tr>
          </tbody>

          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Data Kesehatan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Golongan Darah</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->attrGolonganDarah ? $penduduk->attrGolonganDarah->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Nomor BPJS Kesehatan</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->no_bpjs }}</td>
            </tr>
          </tbody>

          <thead>
            <tr>
              <th scope="col" colspan="3" class="text-nowrap">Data Lainnya</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap" style="width: 300px">Bahasa</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->attrBahasa ? $penduduk->attrBahasa->deskripsi : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Keterangan</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $penduduk->ket ? $penduduk->ket : '-' }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection