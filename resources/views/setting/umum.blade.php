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
                  src="{{ asset (settings()->group('umum')->get('app_logo', 'images/logo/logo.png')) }}"
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
                        <img src="{{ asset(settings()->group('umum')->get('app_banner')) }}" id="preview-image-before-upload" alt="preview image" style="max-height: 250px;">
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
            {{-- <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_desa">Nama Desa</label>
              <input
                type="text"
                class="form-control"
                id="nama_desa"
                name="nama_desa"
                placeholder="nama desa"
                value="{{ settings()->get('nama_desa'); }}"
                data-msg="Please enter nama desa"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="kode_desa">Kode Desa</label>
              <input
                type="text"
                class="form-control"
                id="kode_desa"
                name="kode_desa"
                placeholder="kode desa"
                value="{{ settings()->get('kode_desa'); }}"
                data-msg="Please enter app desa"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="kode_pos">Kode Pos</label>
              <input
                type="text"
                class="form-control"
                id="kode_pos"
                name="kode_pos"
                placeholder="kode pos"
                value="{{ settings()->get('kode_pos'); }}"
                data-msg="Please enter app pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_kecamatan">Nama Kecamatan</label>
              <input
                type="text"
                class="form-control"
                id="nama_kecamatan"
                name="nama_kecamatan"
                placeholder="kode pos"
                value="{{ settings()->get('nama_kecamatan'); }}"
                data-msg="Please enter kode pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="kode_kecamatan">Kode Kecamatan</label>
              <input
                type="text"
                class="form-control"
                id="kode_kecamatan"
                name="kode_kecamatan"
                placeholder="kode kecamatan"
                value="{{ settings()->get('kode_kecamatan'); }}"
                data-msg="Please enter app pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_camat">Nama Camat</label>
              <input
                type="text"
                class="form-control"
                id="nama_camat"
                name="nama_camat"
                placeholder="nama camat"
                value="{{ settings()->get('nama_camat'); }}"
                data-msg="Please enter app pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nip_camat">NIP Camat</label>
              <input
                type="text"
                class="form-control"
                id="nip_camat"
                name="nip_camat"
                placeholder="nip camat"
                value="{{ settings()->get('nip_camat'); }}"
                data-msg="Please enter app pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_kabupaten">Nama Kabupaten</label>
              <input
                type="text"
                class="form-control"
                id="nama_kabupaten"
                name="nama_kabupaten"
                placeholder="kode pos"
                value="{{ settings()->get('nama_kabupaten'); }}"
                data-msg="Please enter kode pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="kode_kabupaten">Kode Kabupaten</label>
              <input
                type="text"
                class="form-control"
                id="kode_kabupaten"
                name="kode_kabupaten"
                placeholder="kode kabupaten"
                value="{{ settings()->get('kode_kabupaten'); }}"
                data-msg="Please enter app pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_bupati">Nama Bupati</label>
              <input
                type="text"
                class="form-control"
                id="nama_bupati"
                name="nama_bupati"
                placeholder="nama bupati"
                value="{{ settings()->get('nama_bupati'); }}"
                data-msg="Please enter app pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_provinsi">Nama Provinsi</label>
              <input
                type="text"
                class="form-control"
                id="nama_provinsi"
                name="nama_provinsi"
                placeholder="kode pos"
                value="{{ settings()->get('nama_provinsi'); }}"
                data-msg="Please enter kode pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="kode_provinsi">Kode Provinsi</label>
              <input
                type="text"
                class="form-control"
                id="kode_provinsi"
                name="kode_provinsi"
                placeholder="kode provinsi"
                value="{{ settings()->get('kode_provinsi'); }}"
                data-msg="Please enter app pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="country">Kepala Desa</label>
              <select id="country" class="select2 form-select" name="kepala_desa">
                <option value="">Select Pegawai</option>
                @foreach ($pegawai as $item)
                    <option value="{{ $item->nama }}" {{ settings()->get('kepala_desa') == $item->nama ? 'selected' : '' }}>{{ $item->jabatan->nama }} - {{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nip_kapala_desa">NIP Kepala Desa</label>
              <input
                type="text"
                class="form-control"
                id="nip_kapala_desa"
                name="nip_kapala_desa"
                placeholder="nip kepala desa"
                value="{{ settings()->get('nip_kapala_desa'); }}"
                data-msg="Please enter app pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="accountLastName">Last Name</label>
              <input
                type="text"
                class="form-control"
                id="accountLastName"
                name="lastName"
                placeholder="Doe"
                value="Doe"
                data-msg="Please enter last name"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="accountEmail">Email</label>
              <input
                type="email"
                class="form-control"
                id="accountEmail"
                name="email"
                placeholder="Email"
                value="johndoe@gmail.com"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="accountOrganization">Organization</label>
              <input
                type="text"
                class="form-control"
                id="accountOrganization"
                name="organization"
                placeholder="Organization name"
                value="PIXINVENT"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="accountPhoneNumber">Phone Number</label>
              <input
                type="text"
                class="form-control account-number-mask"
                id="accountPhoneNumber"
                name="phoneNumber"
                placeholder="Phone Number"
                value="457 657 1237"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="accountAddress">Address</label>
              <input type="text" class="form-control" id="accountAddress" name="address" placeholder="Your Address" />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="accountState">State</label>
              <input type="text" class="form-control" id="accountState" name="state" placeholder="State" />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="accountZipCode">Zip Code</label>
              <input
                type="text"
                class="form-control account-zip-code"
                id="accountZipCode"
                name="zipCode"
                placeholder="Code"
                maxlength="6"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="country">Country</label>
              <select id="country" class="select2 form-select">
                <option value="">Select Country</option>
                <option value="Australia">Australia</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Belarus">Belarus</option>
                <option value="Brazil">Brazil</option>
                <option value="Canada">Canada</option>
                <option value="China">China</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Korea">Korea, Republic of</option>
                <option value="Mexico">Mexico</option>
                <option value="Philippines">Philippines</option>
                <option value="Russia">Russian Federation</option>
                <option value="South Africa">South Africa</option>
                <option value="Thailand">Thailand</option>
                <option value="Turkey">Turkey</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
              </select>
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label for="language" class="form-label">Language</label>
              <select id="language" class="select2 form-select">
                <option value="">Select Language</option>
                <option value="en">English</option>
                <option value="fr">French</option>
                <option value="de">German</option>
                <option value="pt">Portuguese</option>
              </select>
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label for="timeZones" class="form-label">Timezone</label>
              <select id="timeZones" class="select2 form-select">
                <option value="">Select Time Zone</option>
                <option value="-12">
                  (GMT-12:00) International Date Line West
                </option>
                <option value="-11">
                  (GMT-11:00) Midway Island, Samoa
                </option>
                <option value="-10">
                  (GMT-10:00) Hawaii
                </option>
                <option value="-9">
                  (GMT-09:00) Alaska
                </option>
                <option value="-8">
                  (GMT-08:00) Pacific Time (US & Canada)
                </option>
                <option value="-8">
                  (GMT-08:00) Tijuana, Baja California
                </option>
                <option value="-7">
                  (GMT-07:00) Arizona
                </option>
                <option value="-7">
                  (GMT-07:00) Chihuahua, La Paz, Mazatlan
                </option>
                <option value="-7">
                  (GMT-07:00) Mountain Time (US & Canada)
                </option>
                <option value="-6">
                  (GMT-06:00) Central America
                </option>
                <option value="-6">
                  (GMT-06:00) Central Time (US & Canada)
                </option>
                <option value="-6">
                  (GMT-06:00) Guadalajara, Mexico City, Monterrey
                </option>
                <option value="-6">
                  (GMT-06:00) Saskatchewan
                </option>
                <option value="-5">
                  (GMT-05:00) Bogota, Lima, Quito, Rio Branco
                </option>
                <option value="-5">
                  (GMT-05:00) Eastern Time (US & Canada)
                </option>
                <option value="-5">
                  (GMT-05:00) Indiana (East)
                </option>
                <option value="-4">
                  (GMT-04:00) Atlantic Time (Canada)
                </option>
                <option value="-4">
                  (GMT-04:00) Caracas, La Paz
                </option>
                <option value="-4">
                  (GMT-04:00) Manaus
                </option>
                <option value="-4">
                  (GMT-04:00) Santiago
                </option>
                <option value="-3.5">
                  (GMT-03:30) Newfoundland
                </option>
              </select>
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label for="currency" class="form-label">Currency</label>
              <select id="currency" class="select2 form-select">
                <option value="">Select Currency</option>
                <option value="usd">USD</option>
                <option value="euro">Euro</option>
                <option value="pound">Pound</option>
                <option value="bitcoin">Bitcoin</option>
              </select>
            </div> --}}
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
