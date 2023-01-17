@extends('layouts/contentLayoutMaster')

@section('title', __('Edit').' Pengaturan Surat')

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
        <h4 class="card-title">Pengaturan Surat</h4>
        <a href="{{ route('site.surat.index') }}" class="btn btn-primary">@lang('Back')</a>
      </div>
      <div class="card-body py-2 my-25">
        <!-- form -->
        <form class="validate-form" action="{{ route('site.surat.update', $surat->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="klasifikasi_surat_id">Klasifikasi Surat</label>
              <select class="form-select select2" id="klasifikasi_surat_id" name="klasifikasi_surat_id">
                <option value="">Pilih Klasifikasi Surat</option>
                @foreach ($klasifikasi as $item)
                    <option value="{{ $item->id }}" {{ old('klasifikasi_surat_id', $surat->klasifikasi_surat_id) == $item->id ? 'selected' : '' }}>{{ $item->kode }} | {{ $item->nama }}</option>
                @endforeach
              </select>
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
                value="{{ old('nama', $surat->nama) }}"
              />
              @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

              <div class="col-12 col-sm-8 mb-1">
                  <div class="mb-1">
                      <label class="form-label" for="masa_berlaku">Masa Berlaku</label>
                      <input
                      type="text"
                      id="masa_berlaku"
                      class="form-control @error('masa_berlaku')
                          is-invalid
                      @enderror"
                      name="masa_berlaku"
                      value="{{ old('masa_berlaku', Str::beforeLast($surat->masa_berlaku, ' ')) }}"
                      required
                      />
                      @error('masa_berlaku')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
              </div>

            <div class="col-12 col-sm-4 mb-1">
              <label class="form-label" for="lama">Lama</label>
              <select class="form-select select2" id="lama" name="lama">
                  <option value="Hari">Hari</option>
                  <option value="Minggu">Minggu</option>
                  <option value="Bulan">Bulan</option>
                  <option value="Tahun">Tahun</option>
              </select>
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="jenis">Jenis</label>
              <input
                type="text"
                class="form-control @error('jenis')
                    is-invalid
                @enderror"
                id="jenis"
                name="jenis"
                value="{{ old('jenis', $surat->jenis) }}"
              />
              @error('jenis')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="link">Link</label>
              <input
                type="text"
                class="form-control @error('link')
                    is-invalid
                @enderror"
                id="link"
                name="link"
                value="{{ old('link', $surat->link) }}"
              />
              @error('link')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="layanan">Layanan</label>
              <select class="form-select select2" id="layanan" name="layanan">
                <option value="">Pilih Layanan</option>
                <option value="1" {{ old('layanan', $surat->layanan) == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="2" {{ old('layanan', $surat->layanan) == 2 ? 'selected' : '' }}>Nonaktif</option>
              </select>
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
