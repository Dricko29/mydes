@extends('layouts/contentLayoutMaster')

@section('title', 'Biodata Penduduk')

@section('content')
<div class="row" id="table-responsive">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">Biodata</h4>
      </div>
      <div class="card-body">
        <a href="{{ route('user.biodata.print') }}" class="btn btn-warning btn-sm" title="preview biodata">
            <i data-feather="list" class="me-25"></i>
            <span>@lang('Cetak Biodata')</span>
        </a>
        <hr>

        <!-- Address and Contact starts -->
        <div class="card-body pt-2">
            <div class="row">
                <div class="user-avatar-section">
                  <div class="d-flex align-items-center flex-column">
                    <img
                      class="img-fluid rounded mt-3 mb-2"
                      src="{{asset($layanan->penduduk->foto_url)}}"
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
              <td class="text-nowrap">{{ $layanan->penduduk->nama }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">NIK</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->nik }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor Keluarga</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->keluarga ? $layanan->penduduk->keluarga->no_keluarga : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor KK Sebelumnya</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->no_keluarga_sebelumnya }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Hubungan Dalam Keluarga</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrHubungan ? $layanan->penduduk->attrHubungan->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Jenis Kelamin</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrKelamin ? $layanan->penduduk->attrKelamin->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Agama</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrAgama ? $layanan->penduduk->attrAgama->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Status</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrStatus ? $layanan->penduduk->attrStatus->nama : '-' }}</td>
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
              <td class="text-nowrap">{{ $layanan->penduduk->tempat_lahir }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Akta Kelahiran</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->no_akta_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tanggal Lahir</td>
              <td>:</td>
              <td class="text-nowrap">{{ \Carbon\Carbon::parse($layanan->penduduk->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tempat Dilahirkan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->tempat_dilahirkan }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Waktu Kelahirkan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->waktu_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Jenis Kelahirkan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->jenis_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Penolong Kelahirkan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->penolong_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Anak Ke</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->anak_ke }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Berat Kelahiran <small>(gram)</small></td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->berat_kelahiran }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Panjang Kelahiran <small>(centimeter)</small></td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->panjang_kelahiran }}</td>
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
              <td class="text-nowrap">{{ $layanan->penduduk->attrPendidikanKeluarga ? $layanan->penduduk->attrPendidikanKeluarga->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Pendidikan Sedang Ditempuh</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrPendidikan ? $layanan->penduduk->attrPendidikan->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Pekerjaan</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrPekerjaan? $layanan->penduduk->attrPekerjaan->nama : '-' }}</td>
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
              <td class="text-nowrap">{{ $layanan->penduduk->attrSuku ? $layanan->penduduk->attrSuku->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Warganegara</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->attrWarganegara ? $layanan->penduduk->attrWarganegara->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor Paspor</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->no_paspor ? $layanan->penduduk->no_paspor : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tanggal Berakhir Paspor</td>
              <td>:</td>
              <td class="text-nowrap">{{ \Carbon\Carbon::parse($layanan->penduduk->tanggal_paspor)->format('d-m-Y') }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Nomor Kitas/Kitap</td>
              <td>:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->kitas ? $layanan->penduduk->kitas : '-' }}</td>
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
              <td class="text-nowrap">{{ $layanan->penduduk->nama_ayah ? $layanan->penduduk->nama_ayah : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">NIKAyah</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->nik_ayah ? $layanan->penduduk->nik_ayah : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Nama Ibu</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->nama_ibu ? $layanan->penduduk->nama_ibu : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">NIK Ibu</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->nik_ibu ? $layanan->penduduk->nik_ibu : '-' }}</td>
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
              <td class="text-nowrap">{{ $layanan->penduduk->alamat ? $layanan->penduduk->alamat : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Dusun</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->dusun ? $layanan->penduduk->dusun->nama_dusun : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">RT/RW</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->rukunWarga->nama_rw }} / {{ $layanan->penduduk->rukunTetangga->nama_rt }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Nomor Telepon</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->tlp ? $layanan->penduduk->tlp : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Email</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->email ? $layanan->penduduk->email : '-' }}</td>
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
              <td class="text-nowrap">{{ $layanan->penduduk->attrStatusKawin ? $layanan->penduduk->attrStatusKawin->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Akta Pernikahan</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->no_akta_pernikahan }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tanggal Pernikahan</td>
              <td>:</td>
              <td class="text-nowrap">{{ \Carbon\Carbon::parse($layanan->penduduk->tanggal_pernikahan)->format('d-m-Y') }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Akta Perceraian</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->no_akta_perceraian }}</td>
            </tr>
            <tr>
              <td class="text-nowrap">Tanggal Perceraian</td>
              <td>:</td>
              <td class="text-nowrap">{{ \Carbon\Carbon::parse($layanan->penduduk->tanggal_perceraian)->format('d-m-Y') }}</td>
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
              <td class="text-nowrap">{{ $layanan->penduduk->attrGolonganDarah ? $layanan->penduduk->attrGolonganDarah->nama : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Nomor BPJS Kesehatan</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->no_bpjs }}</td>
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
              <td class="text-nowrap">{{ $layanan->penduduk->attrBahasa ? $layanan->penduduk->attrBahasa->deskripsi : '-' }}</td>
            </tr>
            <tr>
              <td class="text-nowrap" style="width: 300px">Keterangan</td>
              <td style="width:10px">:</td>
              <td class="text-nowrap">{{ $layanan->penduduk->ket ? $layanan->penduduk->ket : '-' }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection