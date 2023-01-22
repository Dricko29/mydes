
@extends('layouts/contentLayoutMaster')

@section('title', 'Visi Dan Misi')
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
<section class="form-control-repeater">
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
        <a class="nav-link" href="{{ route('site.settings.app.desa') }}">
          <i data-feather="home" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Desa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('site.settings.app.desa.visi.misi') }}">
          <i data-feather="home" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Visi & Misi</span>
        </a>
      </li>
    </ul>

    <!-- profile -->
    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">@lang('Misi')</h4>
      </div>
      <div class="card-body py-2 my-25">
        <!-- form -->
          <form action="{{ route('site.settings.app.desa.visi.misi') }}" method="post" class="invoice-repeater">
            @csrf
            <div class="row">
              <div class="col-12 col-sm-10 mb-1">
                <label class="form-label" for="nama_desa">Visi</label>
                <textarea class="form-control" name="visi" id="" cols="30" rows="10">{{ settings()->group('desa')->get('visi') }}</textarea>
              </div>
            </div>
            <div data-repeater-list="misi">
              @if ($misi)
                  
              @foreach ($misi as $item)
              <div data-repeater-item>
                    
                <div class="row d-flex align-items-end">
                  <div class="col-md-10 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="itemname">Misi</label>
                      <input
                        type="text"
                        class="form-control"
                        id="itemname"
                        name="item"
                        value="{{ $item->item }}"
                        aria-describedby="itemname"
                        placeholder="Vuexy Admin Template"
                      />
                    </div>
                  </div>

                  <div class="col-md-2 col-12 mb-50">
                    <div class="mb-1">
                      <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                        <i data-feather="x" class="me-25"></i>
                        <span>Hapus</span>
                      </button>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
              @endforeach
              @else
              <div data-repeater-item>
                    
                <div class="row d-flex align-items-end">
                  <div class="col-md-10 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="itemname">Misi</label>
                      <input
                        type="text"
                        class="form-control"
                        id="itemname"
                        name="item"
                        aria-describedby="itemname"
                        placeholder="Vuexy Admin Template"
                      />
                    </div>
                  </div>

                  <div class="col-md-2 col-12 mb-50">
                    <div class="mb-1">
                      <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                        <i data-feather="x" class="me-25"></i>
                        <span>Hapus</span>
                      </button>
                    </div>
                  </div>
                </div>
                <hr />
              </div>
              @endif
            </div>
            <div class="row mb-4">
              <div class="col-12">
                <button class="btn btn-icon btn-warning" type="button" data-repeater-create>
                  <i data-feather="plus" class="me-25"></i>
                  <span>Tambah Misi</span>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button class="btn btn-icon btn-primary" type="submit">
                  <i data-feather="save" class="me-25"></i>
                  <span>Simpan</span>
                </button>
              </div>
            </div>
          </form>
        <!--/ form -->
      </div>
    </div>
  </div>
</div>
</section>
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
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
