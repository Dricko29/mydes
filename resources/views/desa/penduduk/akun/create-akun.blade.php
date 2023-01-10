@extends('layouts/contentLayoutMaster')

@section('title', __('Add').' Anggota Keluarga')

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
    {{-- @if ($cek)    
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Perhatian !!</h4>
      <div class="alert-body">
        Tidak ada penduduk yang tidak memiliki no keluarga.
      </div>
    </div>      
    @endif --}}

    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">Data Akun Penduduk</h4>
        <a href="{{ route('site.penduduk.show', $penduduk) }}" class="btn btn-primary">@lang('Back')</a>
      </div>
      <div class="card-body py-2">
        <!-- form -->
        <form class="validate-form" action="{{ route('site.akun.penduduk.store', $penduduk->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="name">Nama</label>
              <input
                type="text"
                class="form-control @error('name')
                    is-invalid
                @enderror"
                id="name"
                name="name"
                value="{{ $penduduk->nama }}"
              />
              @error('name')
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
                value="{{ $penduduk->email ? $penduduk->email : ''}}"
              />
              @error('email')
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

              if (form.length) {
          form.validate({
            ignore: [],
            rules: {
                penduduk_id: {
                    required: true
                }
            },
            messages: {
                penduduk_id: "{{ __('The field is required!') }}",
            },
          });
        }
    });

  </script>
@endsection
