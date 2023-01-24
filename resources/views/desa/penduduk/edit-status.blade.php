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
      <!-- Account -->
        @include('desa.penduduk.menu-edit')
    </ul>

    <!-- profile -->
    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">@lang('Biodata')</h4>
      </div>
      <div class="card-body py-2 my-25">

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
          </div>
          <!--/ header section -->
                      <div class="col-12 col-sm-12">
              <h4 class="fw-bold">Data Diri</h4>
              <hr>
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="nama">Nama</label>
              <input
                type="text"
                class="form-control @error('nama')
                    is-invalid
                @enderror"
                id="nama"
                name="nama"
                value="{{ old('nama', $penduduk->nama) }}"
                readonly
              />
              @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="nik">NIK</label>
              <input
                type="number"
                class="form-control @error('nik')
                    is-invalid
                @enderror"
                id="nik"
                name="nik"
                value="{{ old('nik',$penduduk->nik) }}"
                readonly
              />
              @error('nik')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
              <input
                type="text"
                class="form-control @error('jenis_kelamin')
                    is-invalid
                @enderror"
                id="jenis_kelamin"
                name="jenis_kelamin"
                value="{{ old('jenis_kelamin',$penduduk->attrKelamin->nama) }}"
                readonly
              />
              @error('jenis_kelamin')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
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
    

