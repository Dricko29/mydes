@extends('layouts/contentLayoutMaster')

@section('title', __('Edit').' Pengaduan')

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
        <h4 class="card-title">Data Pengaduan</h4>
        <a href="{{ route('pengaduan.index') }}" class="btn btn-primary">@lang('Back')</a>
      </div>
      <div class="card-body py-2 my-25">
        <!-- form -->
        <form class="validate-form mt-2 pt-50" action="{{ route('pengaduan.update', $pengaduan) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <!-- header section -->
            {{-- <div class="d-flex mb-1">
              <a href="#" class="me-25">
                <img
                  src="{{asset($pegawai->foto ? $pegawai->foto : 'images/portrait/small/avatar-s-11.jpg')}}"
                  id="account-upload-img"
                  class="uploadedAvatar rounded me-50"
                  alt="profile image"
                  height="100"
                  width="100"
                />
              </a>

              <input type="hidden" name="oldFoto" id="" value="{{ $pegawai->foto }}">
              <div class="d-flex align-items-end mt-75 ms-1">
                <div>
                  <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">@lang('Upload')</label>
                  <input type="file" id="account-upload" 
                  class="form-control @error('foto')
                    is-invalid
                   @enderror" name="foto" hidden accept="image/*" value="{{ $pegawai->foto }}"/>
                   @error('foto')
                     <div class="invalid-feedback">
                      {{ $message }}
                     </div>
                   @enderror
                  <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                  <p class="mb-0">@lang('Allowed file types') png, jpg, jpeg.</p>
                </div>
              </div>

            </div> --}}
            <!--/ header section -->
            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="isi">Isi</label>
              <input
                type="text"
                class="form-control @error('isi')
                    is-invalid
                @enderror"
                id="isi"
                name="isi"
                value="{{ old('isi',$pengaduan->isi) }}"
              />
              @error('isi')
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
