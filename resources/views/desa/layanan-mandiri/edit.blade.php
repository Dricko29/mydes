@extends('layouts/contentLayoutMaster')

@section('title', __('Edit').' Pegawai')

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
  <!-- Card layout -->
<section class="card-layout">
  <h5 class="mt-3 mb-2">Dokumen</h5>

  <div class="row row-cols-1 row-cols-md-3 mb-2">
    @foreach ($dokumens as $item)
    <div class="col">
      <div class="card h-100">
        <img class="card-img-top" src="{{asset($item->value)}}" alt="Card image cap" height="200"/>
        <div class="card-body">
          <h4 class="card-title">{{ $item->nama }}</h4>
          {{-- <p class="card-text">
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is
            a little bit longer.
          </p> --}}
        </div>
        <div class="card-footer">
          <small class="text-muted">Kelengkapan Dokumen {{ $item->nama }}</small>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
<!--/ Card layout -->
  <div class="col-12">

    <!-- profile -->
    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">Data Pendaftar</h4>
        <a href="{{ route('site.layananMandiri.index') }}" class="btn btn-primary">@lang('Back')</a>
      </div>
      <div class="card-body py-2 my-25">
        <!-- form -->
        <form class="validate-form" action="{{ route('site.layananMandiri.update', $layananMandiri) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama">Nama</label>
              <input
                type="text"
                class="form-control @error('nama')
                    is-invalid
                @enderror"
                id="nama"
                name="nama"
                value="{{ $layananMandiri->nama }}"
                readonly
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
                type="text"
                class="form-control @error('nik')
                    is-invalid
                @enderror"
                id="nik"
                name="nik"
                value="{{ $layananMandiri->nik }}"
                readonly
              />
              @error('nik')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="no_keluarga">NO KK</label>
              <input
                type="text"
                class="form-control @error('no_keluarga')
                    is-invalid
                @enderror"
                id="no_keluarga"
                name="no_keluarga"
                value="{{ $layananMandiri->no_keluarga }}"
                readonly
              />
              @error('no_keluarga')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="email">Email</label>
              <input
                type="text"
                class="form-control @error('email')
                    is-invalid
                @enderror"
                id="email"
                name="email"
                value="{{ $layananMandiri->email }}"
                readonly
              />
              @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            
            <div class="col-12">
              @if ($layananMandiri->status == 1)
              <button type="submit" class="btn btn-primary mt-1 me-1">@lang('Verifikasi')</button>
              @else
              <button type="submit" class="btn btn-success mt-1 me-1">@lang('Terverifikasi')</button>    
              @endif
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
    });

  </script>
@endsection
