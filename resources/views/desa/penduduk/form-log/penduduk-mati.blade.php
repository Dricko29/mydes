@extends('layouts/contentLayoutMaster')

@section('title', __('Edit Status Penduduk'))

@section('vendor-style')
  <!-- vendor css files -->
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <ul class="nav nav-pills mb-2">
        @include('desa.penduduk.menu-edit')
    </ul>

    <!-- profile -->
    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">@lang('Data Kematian')</h4>
      </div>
      <div class="card-body py-2 my-25">
        <!-- form -->
            <form class="validate-form" action="{{ route('site.penduduk.mati.store', $penduduk->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <input type="hidden" name="penduduk_id" value="{{ $penduduk->id }}">
                <input type="hidden" name="status" value="MATI">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="tanggal_peristiwa">Tanggal Peristiwa</label>
                    <input type="text" class="form-control picker @error('tanggal_peristiwa')
                    is-invalid
                    @enderror" 
                    name="tanggal_peristiwa" 
                    id="tanggal_peristiwa" 
                    value="{{ old('tanggal_peristiwa', \Carbon\Carbon::now()) }}" 
                    autocomplete="off"/>
                    @error('tanggal_peristiwa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="tanggal_lapor">Tanggal Lapor</label>
                    <input type="text" class="form-control picker @error('tanggal_lapor')
                    is-invalid
                    @enderror" 
                    name="tanggal_lapor" 
                    id="tanggal_lapor" 
                    value="{{ old('tanggal_lapor',\Carbon\Carbon::now()) }}" 
                    autocomplete="off"/>
                    @error('tanggal_lapor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-12 col-sm-12 mb-1">
                    <label class="form-label" for="tempat_kematian">Tempat Kematian</label>
                    <input
                    type="text"
                    class="form-control @error('tempat_kematian')
                        is-invalid
                    @enderror"
                    id="tempat_kematian"
                    name="tempat_kematian"
                    value="{{ old('tempat_kematian') }}"
                    required
                    />
                    @error('tempat_kematian')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 col-sm-12 mb-1">
                    <label class="form-label" for="fp-time">Waktu Kematian</label>
                    <input type="text" id="fp-time" class="form-control flatpickr-time text-start" name="waktu_kematian" placeholder="HH:MM" />
                </div>

                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="penyebab_kematian">Penyabab Kematian</label>
                    <select class="form-select select2" id="penyebab_kematian" name="penyebab_kematian" required>
                    <option value="">Pilih Penyebab</option>
                    <option value="sakit biasa" {{ old('penyebab_kematian') == 'sakit biasa' ? 'selected' : '' }}>sakit biasa</option>
                    <option value="wabah"{{ old('penyebab_kematian') == 'wabah' ? 'selected' : '' }}>wabah</option>
                    <option value="kecelakaan"{{ old('penyebab_kematian') == 'kecelakaan' ? 'selected' : '' }}>kecelakaan</option>
                    <option value="kriminalitas"{{ old('penyebab_kematian') == 'kriminalitas' ? 'selected' : '' }}>kriminalitas</option>
                    <option value="bunuh diri"{{ old('penyebab_kematian') == 'bunuh diri' ? 'selected' : '' }}>bunuh diri</option>
                    <option value="lainnya"{{ old('penyebab_kematian') == 'lainnya' ? 'selected' : '' }}>lainnya</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="penerang_kematian">Penerang Kematian</label>
                    <select class="form-select select2" id="penerang_kematian" name="penerang_kematian" required>
                    <option value="">Pilih Penerang</option>
                    <option value="dokter" {{ old('penerang_kematian') == 'dokter' ? 'selected' : '' }}>dokter</option>
                    <option value="tenaga kesehatan" {{ old('penerang_kematian') == 'tenaga kesehatan' ? 'selected' : '' }}>tenaga kesehatan</option>
                    <option value="polisi" {{ old('penerang_kematian') == 'polisi' ? 'selected' : '' }}>polisi</option>
                    <option value="lainnya" {{ old('penerang_kematian') == 'lainnya' ? 'selected' : '' }}>lainnya</option>
                    </select>
                </div>

                <div class="col-12 col-sm-12 mb-1">
                    <label class="form-label" for="no_akta_kematian">No Akta Kematian</label>
                    <input
                    type="text"
                    class="form-control @error('no_akta_kematian')
                        is-invalid
                    @enderror"
                    id="no_akta_kematian"
                    name="no_akta_kematian"
                    value="{{ old('no_akta_kematian') }}"
                    />
                    @error('no_akta_kematian')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 col-sm-12 mb-1">
                    <label class="form-label" for="anak_ke">Anak Ke</label>
                    <input
                    type="text"
                    class="form-control @error('anak_ke')
                        is-invalid
                    @enderror"
                    id="anak_ke"
                    name="anak_ke"
                    value="{{ old('anak_ke') }}"
                    />
                    @error('anak_ke')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 col-sm-12 mb-1">
                    <label class="form-label" for="ket">Keterangan</label>
                    <textarea name="ket" class="form-control @error('ket')
                        is-invalid
                    @enderror" id="ket" rows="5" required>{{ old('ket') }}</textarea>
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
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  {{-- <script src="{{ asset(mix('js/scripts/pages/page-account-settings-account.js')) }}"></script> --}}
  <script>
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
    });
  </script>
@endsection
    

