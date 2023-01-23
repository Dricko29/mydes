@extends('layouts/contentLayoutMaster')

@section('title', __('Edit').' Penduduk')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <!-- profile -->
    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">Data Penduduk Masuk</h4>
        <a href="{{ route('site.penduduk.index') }}" class="btn btn-primary">@lang('Back')</a>
      </div>
      <div class="card-body py-2 my-25">
        <!-- form -->
        <form class="validate-form mt-2 pt-50" action="{{ route('site.penduduk.update', $penduduk) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <!-- header section -->
            <div class="d-flex mb-1">
              <a href="#" class="me-25">
                <img
                  src="{{asset($penduduk->foto_url)}}"
                  id="account-upload-img"
                  class="uploadedAvatar rounded me-50"
                  alt="profile image"
                  height="100"
                  width="100"
                />
              </a>
              <input type="hidden" name="oldFoto" value="{{ $penduduk->foto_url }}">
              <!-- upload and reset button -->
              <div class="d-flex align-items-end mt-75 ms-1">
                <div>
                  <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">@lang('Upload')</label>
                  <input type="file" id="account-upload" 
                  class="form-control @error('foto')
                    is-invalid
                   @enderror" name="foto" hidden accept="image/*" />
                   @error('foto')
                     <div class="invalid-feedback">
                      {{ $message }}
                     </div>
                   @enderror
                  <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                  <p class="mb-0">@lang('Allowed file types') png, jpg, jpeg.</p>
                </div>
              </div>
              <!--/ upload and reset button -->
            </div>
            <!--/ header section -->

            <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Data Diri</h4>
              <hr>
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama">Nama</label>
              <input
                type="text"
                class="form-control @error('nama')
                    is-invalid
                @enderror"
                id="nama"
                name="nama"
                value="{{ old('nama', $penduduk->nama) }}"
              />
              @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nik">NIK</label>
              <input
                type="number"
                class="form-control @error('nik')
                    is-invalid
                @enderror"
                id="nik"
                name="nik"
                value="{{ old('nik',$penduduk->nik) }}"
              />
              @error('nik')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="no_keluarga_sebelumnya">Nomor KK Sebelumnya <span class="text-danger">{{ __('Nullable') }}</span></label>
              <input
                type="number"
                class="form-control @error('no_keluarga_sebelumnya')
                    is-invalid
                @enderror"
                id="no_keluarga_sebelumnya"
                name="no_keluarga_sebelumnya"
                value="{{ old('no_keluarga_sebelumnya',$penduduk->no_keluarga_sebelumnya) }}"
              />
              @error('no_keluarga_sebelumnya')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="hubungan">Hubungan Dalam Keluarga</label>
              <select class="form-select select2" id="hubungan" name="attr_hubungan_id">
                <option value="">Pilih Jenis hubungan</option>
                @foreach ($hubungan as $item)
                    <option value="{{ $item->id }}" {{ old('attr_hubungan_id',$penduduk->attr_hubungan_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="kelamin">Jenis Kelamin</label>
              <select class="form-select select2" id="kelamin" name="attr_kelamin_id">
                <option value="">Pilih Jenis Kelamin</option>
                @foreach ($kelamin as $item)
                    <option value="{{ $item->id }}" {{ old('attr_kelamin_id',$penduduk->attr_kelamin_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="agama">Agama</label>
              <select class="form-select select2" id="agama" name="attr_agama_id">
                <option value="">Pilih Agama</option>
                @foreach ($agama as $item)
                    <option value="{{ $item->id }}" {{ old('attr_agama_id',$penduduk->attr_agama_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="status">Status Penduduk</label>
              <select class="form-select select2" id="status" name="attr_status_id">
                <option value="">Pilih status</option>
                @foreach ($status as $item)
                    <option value="{{ $item->id }}" {{ old('attr_status_id',$penduduk->attr_status_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Data Kelahiran</h4>
              <hr>
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="no_akta_kelahiran">No Akta Kelahiran</label>
              <input
                type="text"
                class="form-control @error('no_akta_kelahiran')
                    is-invalid
                @enderror"
                id="no_akta_kelahiran"
                name="no_akta_kelahiran"
                value="{{ old('no_akta_kelahiran',$penduduk->no_akta_kelahiran) }}"
              />
              @error('no_akta_kelahiran')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
              <input
                type="text"
                class="form-control @error('tempat_lahir')
                    is-invalid
                @enderror"
                id="tempat_lahir"
                name="tempat_lahir"
                value="{{ old('tempat_lahir',$penduduk->tempat_lahir) }}"
              />
              @error('tempat_lahir')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
              <input type="text" class="form-control picker @error('tanggal_lahir')
                is-invalid
              @enderror" 
              name="tanggal_lahir" 
              id="tanggal_lahir" 
              value="{{ old('tanggal_lahir',$penduduk->tanggal_lahir) }}" 
              autocomplete="off"/>
              @error('tanggal_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="tempat_dilahirkan">Tempat Dilahirkan</label>
              <select class="form-select select2" id="tempat_dilahirkan" name="tempat_dilahirkan">
                <option value="">Pilih Tempat</option>
                <option value="puskesmas" {{ old('tempat_dilahirkan', $penduduk->tempat_dilahirkan) == 'puskesmas' ? 'selected' : '' }}>Puskesmas</option>
                <option value="polindes"{{ old('tempat_dilahirkan', $penduduk->tempat_dilahirkan) == 'polindes' ? 'selected' : '' }}>Polindes</option>
                <option value="rumah sakit"{{ old('tempat_dilahirkan', $penduduk->tempat_dilahirkan) == 'rumah sakit' ? 'selected' : '' }}>Rumah Sakit</option>
                <option value="rumah"{{ old('tempat_dilahirkan', $penduduk->tempat_dilahirkan) == 'rumah' ? 'selected' : '' }}>Rumah</option>
                <option value="lainnya"{{ old('tempat_dilahirkan', $penduduk->tempat_dilahirkan) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
              </select>
            </div>
            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="penolong_kelahiran">Penolong Kelahiran</label>
              <select class="form-select select2" id="penolong_kelahiran" name="penolong_kelahiran">
                <option value="">Pilih Penolong</option>
                <option value="dokter" {{ old('penolong_kelahiran',$penduduk->penolong_kelahiran) == 'dokter' ? 'selected' : '' }}>Dokter</option>
                <option value="bidan" {{ old('penolong_kelahiran',$penduduk->penolong_kelahiran) == 'bidan' ? 'selected' : '' }}>Bidan</option>
                <option value="dukun" {{ old('penolong_kelahiran',$penduduk->penolong_kelahiran) == 'dukun' ? 'selected' : '' }}>Dukun</option>
                <option value="lainnya" {{ old('penolong_kelahiran',$penduduk->penolong_kelahiran) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
              </select>
            </div>
            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="jenis_kelahiran">Jenis Kelahiran</label>
              <select class="form-select select2" id="jenis_kelahiran" name="jenis_kelahiran">
                <option value="">Pilih Jenis Kelahiran</option>
                <option value="tunggal" {{ old('jenis_kelahiran', $penduduk->jenis_kelahiran ) == 'tunggal' ? 'selected' : ''  }}>Tunggal</option>
                <option value="kembar 2" {{ old('jenis_kelahiran', $penduduk->jenis_kelahiran) == 'kembar 2' ? 'selected' : ''  }}>Kembar 2</option>
                <option value="kembar 3" {{ old('jenis_kelahiran', $penduduk->jenis_kelahiran) == 'kembar 3' ? 'selected' : ''  }}>Kembar 3</option>
                <option value="kembar 4" {{ old('jenis_kelahiran', $penduduk->jenis_kelahiran) == 'kembar 4' ? 'selected' : ''  }}>Kembar 4</option>
                <option value="kembar 5" {{ old('jenis_kelahiran', $penduduk->jenis_kelahiran) == 'kembar 5' ? 'selected' : ''  }}>Kembar 5</option>
              </select>
            </div>

            <div class="col-12 col-sm-4 mb-1">
                <label class="form-label" for="fp-time">Waktu Kelahiran</label>
                <input type="text" id="fp-time" class="form-control flatpickr-time text-start" name="waktu_kelahiran" value="{{ old('waktu_kelahiran',$penduduk->waktu_kelahiran) }}" placeholder="HH:MM" />
            </div>
            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="berat_kelahiran">Berat Lahir</label>
              <input
                type="text"
                class="form-control @error('berat_kelahiran')
                    is-invalid
                @enderror"
                id="berat_kelahiran"
                name="berat_kelahiran"
                value="{{ old('berat_kelahiran',$penduduk->berat_kelahiran) }}"
              />
              @error('berat_kelahiran')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="panjang_kelahiran">Panjang Lahir</label>
              <input
                type="text"
                class="form-control @error('panjang_kelahiran')
                    is-invalid
                @enderror"
                id="panjang_kelahiran"
                name="panjang_kelahiran"
                value="{{ old('panjang_kelahiran',$penduduk->panjang_kelahiran) }}"
              />
              @error('panjang_kelahiran')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="anak_ke">Anak Ke</label>
              <input
                type="number"
                class="form-control @error('anak_ke')
                    is-invalid
                @enderror"
                id="anak_ke"
                name="anak_ke"
                value="{{ old('anak_ke',$penduduk->anak_ke) }}"
              />
              @error('anak_ke')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Pendidikan Dan Pekerjaan</h4>
              <hr>
            </div>

            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="pendidikan_keluarga">Pendidikan</label>
              <select class="form-select select2" id="pendidikan_keluarga" name="attr_pendidikan_keluarga_id">
                <option value="">Pilih Pendidikan</option>
                @foreach ($pendidikanKK as $item)
                    <option value="{{ $item->id }}" {{ old('attr_pendidikan_keluarga_id', $penduduk->attr_pendidikan_keluarga_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="pendidikan">Pendidikan Ditempuh <span class="text-danger">{{ __('Nullable') }}</span></label>
              <select class="form-select select2" id="pendidikan" name="attr_pendidikan_id">
                <option value="">Pilih Pendidikan</option>
                @foreach ($pendidikan as $item)
                    <option value="{{ $item->id }}" {{ old('attr_pendidikan_id',$penduduk->attr_pendidikan_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="pekerjaan">Pekerjaan</label>
              <select class="form-select select2" id="pekerjaan" name="attr_pekerjaan_id">
                <option value="">Pilih Pekerjaan</option>
                @foreach ($pekerjaan as $item)
                    <option value="{{ $item->id }}" {{ old('attr_pekerjaan_id',$penduduk->attr_pekerjaan_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Data Kewarganegaraan</h4>
              <hr>
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="suku">Suku/Etnis</label>
              <select class="form-select select2" id="suku" name="attr_suku_id">
                <option value="">Pilih Suku</option>
                @foreach ($suku as $item)
                    <option value="{{ $item->id }}" {{ old('attr_suku_id',$penduduk->attr_suku_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="warganegara">Status Warganegara</label>
              <select class="form-select select2" id="warganegara" name="attr_warganegara_id">
                <option value="">Pilih Warganegara</option>
                @foreach ($warganegara as $item)
                    <option value="{{ $item->id }}" {{ old('attr_warganegara_id',$penduduk->attr_warganegara_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="paspor">Nomor Paspor</label>
              <input
                type="text"
                class="form-control @error('paspor')
                    is-invalid
                @enderror"
                id="paspor"
                name="paspor"
                value="{{ old('paspor',$penduduk->paspor) }}"
              />
              @error('paspor')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="tanggal_paspor">Tanggal Berakhir Paspor</label>
              <input type="text" class="form-control picker @error('tanggal_paspor')
                is-invalid
              @enderror" 
              name="tanggal_paspor" 
              id="tanggal_paspor" 
              value="{{ old('tanggal_paspor',$penduduk->tanggal_paspor) }}" 
              autocomplete="off"/>
              @error('tanggal_paspor')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="kitas">Kitas/Kitap</label>
              <input
                type="text"
                class="form-control @error('kitas')
                    is-invalid
                @enderror"
                id="kitas"
                name="kitas"
                value="{{ old('kitas',$penduduk->kitas) }}"
              />
              @error('kitas')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Data Orang Tua</h4>
              <hr>
            </div>
             
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_ayah">Nama Ayah</label>
              <input
                type="text"
                class="form-control @error('nama_ayah')
                    is-invalid
                @enderror"
                id="nama_ayah"
                name="nama_ayah"
                value="{{ old('nama_ayah',$penduduk->nama_ayah) }}"
              />
              @error('nama_ayah')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nik_ayah">NIK Ayah</label>
              <input
                type="number"
                class="form-control @error('nik_ayah')
                    is-invalid
                @enderror"
                id="nik_ayah"
                name="nik_ayah"
                value="{{ old('nik_ayah',$penduduk->nik_ayah) }}"
              />
              @error('nik_ayah')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
                        
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_ibu">Nama Ibu</label>
              <input
                type="text"
                class="form-control @error('nama_ibu')
                    is-invalid
                @enderror"
                id="nama_ibu"
                name="nama_ibu"
                value="{{ old('nama_ibu',$penduduk->nama_ibu) }}"
              />
              @error('nama_ibu')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nik_ibu">NIK Ibu</label>
              <input
                type="number"
                class="form-control @error('nik_ibu')
                    is-invalid
                @enderror"
                id="nik_ibu"
                name="nik_ibu"
                value="{{ old('nik_ibu',$penduduk->nik_ibu) }}"
              />
              @error('nik_ibu')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Data Alamat</h4>
              <hr>
            </div>

            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="dusun">Dusun</label>
              <select class="form-select select2" id="dusun" name="dusun_id">
                <option value="">Pilih Dusun</option>
                @foreach ($dusun as $item)
                    <option value="{{ $item->id }}" {{ old('dusun_id',$penduduk->dusun_id) == $item->id ? 'selected' : '' }}>{{ $item->nama_dusun }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="rukun_warga">RW</label>
              <select class="form-select select2" id="rukun_warga" name="rukun_warga_id">
                <option value="{{ $penduduk->rukun_warga_id }}" selected>{{ $penduduk->rukunWarga->nama_rw }}</option>
              </select>
            </div>

            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="rukun_tetangga">RT</label>
              <select class="form-select select2" id="rukun_tetangga" name="rukun_tetangga_id">
                <option value="{{ $penduduk->rukun_tetangga_id }}" selected>{{ $penduduk->rukunTetangga->nama_rt }}</option>
              </select>
            </div>

                                    
            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="alamat">Alamat</label>
              <input
                type="text"
                class="form-control @error('alamat')
                    is-invalid
                @enderror"
                id="alamat"
                name="alamat"
                value="{{ old('alamat',$penduduk->alamat) }}"
              />
              @error('alamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
                                    
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="tlp">No Tlp</label>
              <input
                type="text"
                class="form-control @error('tlp')
                    is-invalid
                @enderror"
                id="tlp"
                name="tlp"
                value="{{ old('tlp',$penduduk->tlp) }}"
              />
              @error('tlp')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
                                    
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="email">Email</label>
              <input
                type="email"
                class="form-control @error('email')
                    is-invalid
                @enderror"
                id="email"
                name="email"
                value="{{ old('email',$penduduk->email) }}"
              />
              @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Data Perkawinan</h4>
              <hr>
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="attr_status_kawin">Status Kawin</label>
              <select class="form-select select2" id="attr_status_kawin" name="attr_status_kawin_id">
                <option value="">Pilih Status Kawin</option>
                @foreach ($statusKawin as $item)
                    <option value="{{ $item->id }}" {{ old('attr_status_kawin_id',$penduduk->attr_status_kawin_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="no_akta_pernikahan">No Akta Pernikahan</label>
              <input
                type="text"
                class="form-control @error('no_akta_pernikahan')
                    is-invalid
                @enderror"
                id="no_akta_pernikahan"
                name="no_akta_pernikahan"
                value="{{ old('no_akta_pernikahan',$penduduk->no_akta_pernikahan) }}"
              />
              @error('no_akta_pernikahan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="tanggal_pernikahan">Tanggal Pernikahan</label>
              <input type="text" class="form-control picker @error('tanggal_pernikahan')
                is-invalid
              @enderror" 
              name="tanggal_pernikahan" 
              id="tanggal_pernikahan" 
              value="{{ old('tanggal_pernikahan',$penduduk->tanggal_pernikahan) }}" 
              autocomplete="off"/>
              @error('tanggal_pernikahan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="no_akta_perceraian">No Akta Perceraian</label>
              <input
                type="text"
                class="form-control @error('no_akta_perceraian')
                    is-invalid
                @enderror"
                id="no_akta_perceraian"
                name="no_akta_perceraian"
                value="{{ old('no_akta_perceraian',$penduduk->no_akta_perceraian) }}"
              />
              @error('no_akta_perceraian')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="tanggal_perceraian">Tanggal Perceraian</label>
              <input type="text" class="form-control picker @error('tanggal_perceraian')
                is-invalid
              @enderror" 
              name="tanggal_perceraian" 
              id="tanggal_perceraian" 
              value="{{ old('tanggal_perceraian',$penduduk->tanggal_perceraian) }}" 
              autocomplete="off"/>
              @error('tanggal_perceraian')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Data Kesehatan</h4>
              <hr>
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="attr_golongan_darah">Golongan Darah</label>
              <select class="form-select select2" id="attr_golongan_darah" name="attr_golongan_darah_id">
                <option value="">Pilih Golongan Darah</option>
                @foreach ($golonganDarah as $item)
                    <option value="{{ $item->id }}" {{ old('attr_golongan_darah_id',$penduduk->attr_golongan_darah_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="no_bpjs">Nomor BPJS</label>
              <input
                type="text"
                class="form-control @error('no_bpjs')
                    is-invalid
                @enderror"
                id="no_bpjs"
                name="no_bpjs"
                value="{{ old('no_bpjs',$penduduk->no_bpjs) }}"
              />
              @error('no_bpjs')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Data Lainnya</h4>
              <hr>
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="attr_bahasa">Bahasa</label>
              <select class="form-select select2" id="attr_bahasa" name="attr_bahasa_id">
                <option value="">Pilih Bahasa</option>
                @foreach ($bahasa as $item)
                    <option value="{{ $item->id }}" {{ old('attr_bahasa_id',$penduduk->attr_bahasa_id) == $item->id ? 'selected' : '' }}>{{ $item->deskripsi }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="ket">Keterangan</label>
              <input
                type="text"
                class="form-control @error('ket')
                    is-invalid
                @enderror"
                id="ket"
                name="ket"
                value="{{ old('ket',$penduduk->ket) }}"
              />
              @error('ket')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary mt-1 me-1">@lang('Save')</button>
              <button type="reset" class="btn btn-outline-secondary mt-1">@lang('Cancel')</button>
            </div>
          </div>
        </form>
        <!--/ form -->
      </div>
    </div>

    <!--/ profile -->
  </div>
</div>
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  {{-- <script src="{{ asset(mix('js/scripts/pages/page-account-settings-account.js')) }}"></script> --}}
  <script>

    $(document).ready(function () {
  
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#dusun').on('change', function () {
                var idDusun = this.value;
                $("#rukun_warga").html('');
                $.ajax({
                    url: "{{url('api/fetch-rw')}}",
                    type: "POST",
                    data: {
                        dusuns_id: idDusun,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#rukun_warga').html('<option value="">Pilih Rw</option>');
                        $.each(result.rw, function (key, value) {
                            $("#rukun_warga").append('<option value="' + value
                                .id + '">' + value.nama_rw + '</option>');
                        });
                        $('#rukun_tetangga').html('<option value="">Pilih Rt</option>');
                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#rukun_warga').on('change', function () {
                var idRw = this.value;
                $("#rukun_tetangga").html('');
                $.ajax({
                    url: "{{url('api/fetch-rt')}}",
                    type: "POST",
                    data: {
                        rukun_wargas_id: idRw,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#rukun_tetangga').html('<option value="">Pilih Rt</option>');
                        $.each(res.rt, function (key, value) {
                            $("#rukun_tetangga").append('<option value="' + value
                                .id + '">' + value.nama_rt + '</option>');
                        });
                    }
                });
            });
  
        });
    $(function () {
      ('use strict');

      @if (Session::has('success'))
      toastr['success']("{{ session('success') }}", '{{ __('Success') }}', {
          closeButton: true,
          tapToDismiss: false,
          progressBar: true,
      }); 
      @elseif (Session::has('error'))
      toastr['error']("{{ session('error') }}", '{{ __('Failed') }}', {
          closeButton: true,
          tapToDismiss: false,
          progressBar: true,
      }); 
      @endif

      // variables
      var form = $('.validate-form'),
        picker = $('.picker'),
        timePickr = $('.flatpickr-time'),
        accountUploadImg = $('#account-upload-img'),
        accountUploadBtn = $('#account-upload'),
        accountUserImage = $('.uploadedAvatar'),
        accountResetBtn = $('#account-reset'),
        accountNumberMask = $('.account-number-mask'),
        accountZipCode = $('.account-zip-code'),
        select2 = $('.select2');

      // Update user photo on click of button

      if (accountUserImage) {
        var resetImage = accountUserImage.attr('src');
        accountUploadBtn.on('change', function (e) {
          var reader = new FileReader(),
            files = e.target.files;
          reader.onload = function () {
            if (accountUploadImg) {
              accountUploadImg.attr('src', reader.result);
            }
          };
          reader.readAsDataURL(files[0]);
        });

        accountResetBtn.on('click', function () {
          accountUserImage.attr('src', resetImage);
        });
      }


      //phone
      if (accountNumberMask.length) {
        accountNumberMask.each(function () {
          new Cleave($(this), {
            phone: true,
            phoneRegionCode: 'US'
          });
        });
      }

      //zip code
      if (accountZipCode.length) {
        accountZipCode.each(function () {
          new Cleave($(this), {
            delimiter: '',
            numeral: true
          });
        });
      }

      // For all Select2
      if (select2.length) {
        select2.each(function () {
          var $this = $(this);
          $this.wrap('<div class="position-relative"></div>');
          $this.select2({
            dropdownParent: $this.parent()
          });
        });
      }
      // Picker
    if (picker.length) {
        picker.flatpickr({
        allowInput: true,
        altInput: true,
        altFormat: 'd-m-Y',
        dateFormat: 'Y-m-d',
        onReady: function (selectedDates, dateStr, instance) {
            if (instance.isMobile) {
            $(instance.mobileInput).attr('step', null);
            }
        }
        });
    }
    if (timePickr.length) {
        timePickr.flatpickr({
        enableTime: true,
        noCalendar: true,
        });
    }

        if (form.length) {
          form.validate({
            ignore: [],
            rules: {
                attr_hubungan_id: {
                    required: true
                },
                attr_kelamin_id: {
                    required: true
                },
                attr_agama_id: {
                    required: true
                },
                attr_pendidikan_keluarga_id: {
                    required: true
                },
                attr_pekerjaan_id: {
                    required: true
                },
                attr_status_id: {
                    required: true
                },
                attr_golongan_darah_id: {
                    required: true
                },
                attr_warganegara_id: {
                    required: true
                },
                attr_suku_id: {
                    required: true
                },
                attr_status_kawin_id: {
                    required: true
                },
                dusun_id: {
                    required: true
                },
                rukun_warga_id: {
                    required: true
                },
                rukun_tetangga_id: {
                    required: true
                },
            },
            messages: {
                attr_hubungan_id: "{{ __('The field is required!') }}",
                attr_kelamin_id: "{{ __('The field is required!') }}",
                attr_agama_id: "{{ __('The field is required!') }}",
                attr_pendidikan_keluarga_id: "{{ __('The field is required!') }}",
                attr_pekerjaan_id: "{{ __('The field is required!') }}",
                attr_status_id: "{{ __('The field is required!') }}",
                attr_status_kawin_id: "{{ __('The field is required!') }}",
                attr_golongan_darah_id: "{{ __('The field is required!') }}",
                attr_warganegara_id: "{{ __('The field is required!') }}",
                attr_suku_id: "{{ __('The field is required!') }}",
                dusun_id: "{{ __('The field is required!') }}",
                rukun_warga_id: "{{ __('The field is required!') }}",
                rukun_tetangga_id: "{{ __('The field is required!') }}",
            },
          });
        }
    });

  </script>
@endsection
