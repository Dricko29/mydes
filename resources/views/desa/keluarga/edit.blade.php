@extends('layouts/contentLayoutMaster')

@section('title', __('Edit').' Keluarga')

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
        <h4 class="card-title">Data Keluarga</h4>
        <a href="{{ route('site.penduduk.index') }}" class="btn btn-primary">@lang('Back')</a>
      </div>
      <div class="card-body py-2 my-25">
        <!-- form -->
        <form class="validate-form" action="{{ route('site.keluarga.update', $keluarga) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">

            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="tanggal_terdaftar">Tanggal Terdaftar</label>
              <input type="text" class="form-control picker @error('tanggal_terdaftar')
                is-invalid
              @enderror" 
              name="tanggal_terdaftar" 
              id="tanggal_terdaftar" 
              value="{{ old('tanggal_terdaftar', $keluarga->tanggal_terdaftar) }}" 
              autocomplete="off"/>
              @error('tanggal_terdaftar')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="tanggal_cetak">Tanggal Cetak</label>
              <input type="text" class="form-control picker @error('tanggal_cetak')
                is-invalid
              @enderror" 
              name="tanggal_cetak" 
              id="tanggal_cetak" 
              value="{{ old('tanggal_cetak',$keluarga->tanggal_cetak) }}" 
              autocomplete="off"/>
              @error('tanggal_cetak')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="no_keluarga">Nomor Keluarga</label>
              <input
                type="text"
                class="form-control @error('no_keluarga')
                    is-invalid
                @enderror"
                id="no_keluarga"
                name="no_keluarga"
                value="{{ old('no_keluarga', $keluarga->no_keluarga) }}"
              />
              @error('no_keluarga')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="col-12 col-sm-12 mb-1">
              <label class="form-label" for="alamat">Alamat</label>
              <input
                type="text"
                class="form-control @error('alamat')
                    is-invalid
                @enderror"
                id="alamat"
                name="alamat"
                value="{{ old('alamat', $keluarga->alamat) }}"
              />
              @error('alamat')
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

    $(document).ready(function () {
  
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#dusun').on('change', function () {
                var idDusun = this.value;
                $("#rukun_warga").html('');
                $.ajax({
                    url: "{{url('api/fetch-rw')}}",
                    type: "POST",
                    data: {
                        dusuns_id: idDusun,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#rukun_warga').html('<option value="">Pilih Rw</option>');
                        $.each(result.rw, function (key, value) {
                            $("#rukun_warga").append('<option value="' + value
                                .id + '">' + value.nama_rw + '</option>');
                        });
                        $('#rukun_tetangga').html('<option value="">Pilih Rt</option>');
                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#rukun_warga').on('change', function () {
                var idRw = this.value;
                $("#rukun_tetangga").html('');
                $.ajax({
                    url: "{{url('api/fetch-rt')}}",
                    type: "POST",
                    data: {
                        rukun_wargas_id: idRw,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#rukun_tetangga').html('<option value="">Pilih Rt</option>');
                        $.each(res.rt, function (key, value) {
                            $("#rukun_tetangga").append('<option value="' + value
                                .id + '">' + value.nama_rt + '</option>');
                        });
                    }
                });
            });
  
        });
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
        timePickr = $('.flatpickr-time'),
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
    if (timePickr.length) {
        timePickr.flatpickr({
        enableTime: true,
        noCalendar: true,
        });
    }

        if (form.length) {
          form.validate({
            ignore: [],
            rules: {
                attr_hubungan_id: {
                    required: true
                },
                attr_kelamin_id: {
                    required: true
                },
                attr_agama_id: {
                    required: true
                },
                attr_pendidikan_keluarga_id: {
                    required: true
                },
                attr_pekerjaan_id: {
                    required: true
                },
                attr_status_id: {
                    required: true
                },
                attr_golongan_darah_id: {
                    required: true
                },
                attr_warganegara_id: {
                    required: true
                },
                attr_suku_id: {
                    required: true
                },
                attr_status_kawin_id: {
                    required: true
                },
                dusun_id: {
                    required: true
                },
                rukun_warga_id: {
                    required: true
                },
                rukun_tetangga_id: {
                    required: true
                },
            },
            messages: {
                attr_hubungan_id: "{{ __('The field is required!') }}",
                attr_kelamin_id: "{{ __('The field is required!') }}",
                attr_agama_id: "{{ __('The field is required!') }}",
                attr_pendidikan_keluarga_id: "{{ __('The field is required!') }}",
                attr_pekerjaan_id: "{{ __('The field is required!') }}",
                attr_status_id: "{{ __('The field is required!') }}",
                attr_status_kawin_id: "{{ __('The field is required!') }}",
                attr_golongan_darah_id: "{{ __('The field is required!') }}",
                attr_warganegara_id: "{{ __('The field is required!') }}",
                attr_suku_id: "{{ __('The field is required!') }}",
                dusun_id: "{{ __('The field is required!') }}",
                rukun_warga_id: "{{ __('The field is required!') }}",
                rukun_tetangga_id: "{{ __('The field is required!') }}",
            },
          });
        }
    });

  </script>
@endsection
