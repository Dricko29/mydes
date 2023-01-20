@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
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
  <div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
      <!-- Register Basic -->
      <div class="card mb-0">
        <div class="card-body">
          <a href="/" class="brand-logo">
            <img src="{{ asset(settings()->group('umum')->get('app_logo')) }}" alt="" style="height: 100px">
          </a>

          <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
          <p class="card-text mb-2">Make your app management easy and fun!</p>


          <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-1">
              <label for="register-username" class="form-label">@lang('Full Name')</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="register-username"
                name="nama" placeholder="@lang('Full Name')" aria-describedby="register-username" tabindex="1" autofocus
                value="{{ old('nama') }}" />
              @error('nama')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-1">
              <label for="register-nik" class="form-label">@lang('NIK')</label>
              <input type="text" class="form-control @error('nik') is-invalid @enderror" id="register-nik"
                name="nik" placeholder="@lang('NIK')" aria-describedby="register-nik" tabindex="1" autofocus
                value="{{ old('nik') }}" />
              @error('nik')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-1">
              <label for="register-email" class="form-label">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="register-email"
                name="email" placeholder="john@example.com" aria-describedby="register-email" tabindex="2"
                value="{{ old('email') }}" />
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <label for="" class="form-label mb-1">Foto KTP <span class="text-sm text-danger">(foto ktp harus jelas dan dapat dibaca!!!)</span></label>
            <div class="d-flex mb-1">
              <a href="#" class="me-25">
                <img
                  src="{{asset('images/portrait/small/avatar-s-11.jpg')}}"
                  id="ktp-upload-img"
                  class="uploadedKtp rounded me-50"
                  alt="profile image"
                  height="100"
                  width="100"
                />
              </a>
              <!-- upload and reset button -->
              <div class="d-flex align-items-end mt-75 ms-1">
                <div>
                  <label for="ktp-upload" class="btn btn-sm btn-primary mb-75 me-75">@lang('Upload')</label>
                  <input type="file" id="ktp-upload" 
                  class="form-control @error('foto')
                    is-invalid
                   @enderror" name="foto" hidden accept="image/*" />
                   @error('foto')
                     <div class="invalid-feedback">
                      {{ $message }}
                     </div>
                   @enderror
                  <button type="button" id="ktp-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                  <p class="mb-0">@lang('Allowed file types') png, jpg, jpeg.</p>
                </div>
              </div>
              <!--/ upload and reset button -->
            </div>

            <label for="" class="form-label mb-1">Foto Selfie Dangan KTP <span class="text-sm text-danger">(foto ktp harus jelas dan dapat dibaca!!!)</span></label>
            <div class="d-flex mb-1">
              <a href="#" class="me-25">
                <img
                  src="{{asset('images/portrait/small/avatar-s-11.jpg')}}"
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

            <div class="mb-1">
              <label for="register-password" class="form-label">Password</label>

              <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror"
                  id="register-password" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="register-password" tabindex="3" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-1">
              <label for="register-password-confirm" class="form-label">Confirm Password</label>

              <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge" id="register-password-confirm"
                  name="password_confirmation"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="register-password" tabindex="3" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
              <div class="mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms" name="terms" tabindex="4" />
                  <label class="form-check-label" for="terms">
                    I agree to the <a href="{{ route('terms.show') }}" target="_blank">terms_of_service</a> and
                    <a href="{{ route('policy.show') }}" target="_blank">privacy_policy</a>
                  </label>
                </div>
              </div>
            @endif
            <button type="submit" class="btn btn-primary w-100" tabindex="5">Sign up</button>
          </form>

          <p class="text-center mt-2">
            <span>@lang('Already have an account?')</span>
            @if (Route::has('login'))
              <a href="{{ route('login') }}">
                <span>Login</span>
              </a>
            @endif
          </p>
        </div>
      </div>
      <!-- /Register basic -->
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
        ktpUploadImg = $('#ktp-upload-img'),
        ktpUploadBtn = $('#ktp-upload'),
        ktpUserImage = $('.uploadedKtp'),
        // 
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

      if (ktpUserImage) {
        var resetImage = ktpUserImage.attr('src');
        ktpUploadBtn.on('change', function (e) {
          var reader = new FileReader(),
            files = e.target.files;
          reader.onload = function () {
            if (ktpUploadImg) {
              ktpUploadImg.attr('src', reader.result);
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
