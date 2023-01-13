@extends('layouts/contentLayoutMaster')

@section('title', __('Settings Desa'))

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
        <a class="nav-link" href="{{ route('site.settings.app.umum') }}">
          <i data-feather="settings" class="font-medium-3 me-50"></i>
          <span class="fw-bold">@lang('General')</span>
        </a>
      </li>
      <!-- security -->
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('site.settings.app.desa') }}">
          <i data-feather="home" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Desa</span>
        </a>
      </li>
    </ul>

    <!-- profile -->
    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">@lang('Desa')</h4>
      </div>
      <div class="card-body py-2 my-25">
        <!-- form -->
        <form class="validate-form mt-2 pt-50" action="{{ route('site.settings.app.desa.store') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_desa">Nama Desa</label>
              <input
                type="text"
                class="form-control"
                id="nama_desa"
                name="nama_desa"
                placeholder="nama desa"
                value="{{ settings()->group('desa')->get('nama_desa'); }}"
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
                value="{{ settings()->group('desa')->get('kode_desa'); }}"
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
                value="{{ settings()->group('desa')->get('kode_pos'); }}"
                data-msg="Please enter app pos"
              />
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="alamat_kantor">Alamat Kantor</label>
              <input
                type="text"
                class="form-control"
                id="alamat_kantor"
                name="alamat_kantor"
                placeholder="Alamat Kantor"
                value="{{ settings()->group('desa')->get('alamat_kantor'); }}"
                data-msg="Please enter address"
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
                value="{{ settings()->group('desa')->get('nama_kecamatan'); }}"
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
                value="{{ settings()->group('desa')->get('kode_kecamatan'); }}"
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
                value="{{ settings()->group('desa')->get('nama_camat'); }}"
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
                value="{{ settings()->group('desa')->get('nip_camat'); }}"
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
                value="{{ settings()->group('desa')->get('nama_kabupaten'); }}"
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
                value="{{ settings()->group('desa')->get('kode_kabupaten'); }}"
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
                value="{{ settings()->group('desa')->get('nama_bupati'); }}"
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
                value="{{ settings()->group('desa')->get('nama_provinsi'); }}"
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
                value="{{ settings()->group('desa')->get('kode_provinsi'); }}"
                data-msg="Please enter app pos"
              />
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nama_kapala_desa">Nama Kepala Desa</label>
              <input
                type="text"
                class="form-control"
                id="nama_kapala_desa"
                name="nama_kapala_desa"
                placeholder="nama kepala desa"
                value="{{ settings()->group('desa')->get('nama_kapala_desa'); }}"
                data-msg="Please enter app pos"
              />
            </div>

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="nip_kapala_desa">NIP Kepala Desa</label>
              <input
                type="text"
                class="form-control"
                id="nip_kapala_desa"
                name="nip_kapala_desa"
                placeholder="nip kepala desa"
                value="{{ settings()->group('desa')->get('nip_kapala_desa'); }}"
                data-msg="Please enter app pos"
              />
            </div>

            {{-- <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="country">Kepala Desa</label>
              <select id="country" class="select2 form-select" name="kepala_desa">
                <option value="">Select Pegawai</option>
                @foreach ($pegawai as $item)
                    <option value="{{ $item->nama }}" {{ settings()->get('kepala_desa') == $item->nama ? 'selected' : '' }}>{{ $item->jabatan->nama }} - {{ $item->nama }}</option>
                @endforeach
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
  </script>
@endsection
