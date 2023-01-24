@extends('layouts/contentLayoutMaster')

@section('title', __('Settings Umum'))

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
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('site.settings.app.umum') }}">
          <i data-feather="settings" class="font-medium-3 me-50"></i>
          <span class="fw-bold">@lang('General')</span>
        </a>
      </li>
      <!-- security -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('site.settings.app.desa') }}">
          <i data-feather="home" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Desa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('site.settings.app.desa.visi.misi') }}">
          <i data-feather="home" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Visi & Misi</span>
        </a>
      </li>
    </ul>

    <!-- profile -->
    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">@lang('General')</h4>
      </div>
      <div class="card-body py-2 my-25">
        <!-- form -->
        <form class="validate-form mt-2 pt-50" action="{{ route('site.settings.app.umum.store') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="row">

            <!-- header section -->
            <div class="d-flex mb-2">
              <a href="#" class="me-25">
                <img
                  src="{{  Storage::disk('public')->url(settings()->group('umum')->get('app_logo', 'images/logo/logo.png')) }}"
                  id="account-upload-img"
                  class="uploadedAvatar rounded me-50"
                  alt="profile image"
                  height="100"
                  width="100"
                />
              </a>
              <!-- upload and reset button -->
              <div class="d-flex align-items-end mt-75 ms-1">
                <div>
                  <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                  <input type="file" id="account-upload" name="app_logo" hidden accept="image/*" />
                  <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                  <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                </div>
              </div>
              <!--/ upload and reset button -->
            </div>
            <!--/ header section -->

            <!-- header section -->
                <div class="col-md-12 col-12">
                    <div class="mb-1">
                        <img src="{{ Storage::disk('public')->url(settings()->group('umum')->get('app_banner')) }}" id="preview-image-before-upload" alt="preview image" style="max-height: 250px;">
                    </div>
                </div>

                <div class="col-md-12 col-12">
                    <div class="mb-1">
                      <label for="customFile" class="form-label">Banner</label>
                      <input class="form-control @error('banner')
                        is-invalid
                      @enderror" type="file" id="banner" name="app_banner" value="{{ old('gambar') }}"/>
                      @error('banner')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
            <!--/ header section -->
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="app_nama">App Nama</label>
              <input
                type="text"
                class="form-control"
                id="app_nama"
                name="app_nama"
                placeholder="app nama"
                value="{{ settings()->group('umum')->get('app_nama'); }}"
                data-msg="Mohon masukan app nama"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="app_tlp">App Telpon</label>
              <input
                type="text"
                class="form-control"
                id="app_tlp"
                name="app_tlp"
                placeholder="app tlp"
                value="{{ settings()->group('umum')->get('app_tlp'); }}"
                data-msg="Mohon masukan app tlp"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="app_email">App Email</label>
              <input
                type="text"
                class="form-control"
                id="app_email"
                name="app_email"
                placeholder="app email"
                value="{{ settings()->group('umum')->get('app_email'); }}"
                data-msg="Please enter app email"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="app_website">App Website</label>
              <input
                type="text"
                class="form-control"
                id="app_website"
                name="app_website"
                placeholder="app website"
                value="{{ settings()->group('umum')->get('app_website'); }}"
                data-msg="Please enter app website"
              />
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
    $(document).ready(function (e) {

      
      $('#banner').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
          $('#preview-image-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
      
      });
      
    });
  </script>
@endsection
